<?php

namespace App\Http\Controllers;

use App\Models\Project;

class LandingPageController extends Controller
{
    public function index()
    {

        $projects = Project::all();


        return view('landing', compact('projects'));
    }
}
