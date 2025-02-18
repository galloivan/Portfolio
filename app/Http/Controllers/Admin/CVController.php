<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CVController extends Controller
{
    public function index()
    {
        $cvEnglish = asset('cv/cv_english.pdf');
        $cvFrench = asset('cv/cv_french.pdf');

        return view('admin.dashboard', compact('cvEnglish', 'cvFrench'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf|max:2048',
            'language' => 'required|in:english,french'
        ]);

        $file = $request->file('cv');
        $filename = $request->language == 'english' ? 'cv_english.pdf' : 'cv_french.pdf';


        $file->move(public_path('cv'), $filename);

        return redirect()->route('admin.dashboard')->with('success', 'CV updated successfully.');
    }
}
