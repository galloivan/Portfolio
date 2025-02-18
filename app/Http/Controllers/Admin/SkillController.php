<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{

    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills.index', compact('skills'));
    }


    public function create()
    {
        return view('admin.skills.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $iconPath = null;
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('skills', 'public');
        }

        Skill::create([
            'name' => $request->name,
            'icon' => $iconPath,
        ]);

        return redirect()->route('admin.skills.index')->with('success', 'Skill added successfully.');
    }

    // Show the form for editing the specified skill.
    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skills.edit', compact('skill'));
    }

    // Update the specified skill in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $skill = Skill::findOrFail($id);

        // Delete old icon if a new one is uploaded
        if ($request->hasFile('icon')) {
            if ($skill->icon) {
                Storage::disk('public')->delete($skill->icon);
            }
            $skill->icon = $request->file('icon')->store('skills', 'public');
        }

        $skill->update([
            'name' => $request->name,
            'icon' => $skill->icon, // Keep existing if no new file uploaded
        ]);

        return redirect()->route('admin.skills.index')->with('success', 'Skill updated successfully.');
    }


    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);


        if ($skill->icon) {
            Storage::disk('public')->delete($skill->icon);
        }

        $skill->delete();

        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted successfully.');
    }
}
