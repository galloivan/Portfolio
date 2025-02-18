<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $projects = Project::latest()->take(6)->get();
        $skills = Skill::all();
        $cvEnglish = asset('cv/cv_english.pdf');
        $cvFrench = asset('cv/cv_french.pdf');


        $pendingReviews = Review::where('is_approved', false)->get();


        $approvedReviews = Review::where('is_approved', true)->get();

        return view('admin.dashboard', compact('projects', 'skills', 'cvEnglish', 'cvFrench', 'pendingReviews', 'approvedReviews'));
    }
}
