<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Hardcoded authentication
        if ($request->username === 'galloivan' && $request->password === 'Gallitoylaury9') {
            // Store user info in session manually
            session(['authenticated' => true, 'username' => 'galloivan']);

            return redirect()->route('admin.dashboard');
        }


        return back()->withErrors(['username' => 'Invalid login credentials.'])->withInput();
    }

    public function logout(Request $request)
    {
        session()->forget(['authenticated', 'username']);

        return redirect('/');
    }

}
