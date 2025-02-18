<?php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Review;
use App\Models\Skill;

class LandingPageController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $approvedReviews = Review::where('is_approved', true)->get(); // ✅ Only fetch approved reviews
        $skills = Skill::all();

        return view('landing', compact('projects', 'approvedReviews', 'skills')); // ✅ Pass approved reviews
    }
}
