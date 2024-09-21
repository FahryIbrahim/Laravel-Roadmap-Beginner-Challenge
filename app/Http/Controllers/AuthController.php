<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Login
    public function login(Request $request)
    {
        // Validate the request
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to login the user
        if (Auth::attempt($fields, $request->remember))
        {
            return redirect()->intended('/');
        } else {
            return back()->withErrors([
                'error' => 'Invalid credentials'
            ]);
        }
    }

    // Logout
    public function logout(Request $request)
    {
        // Logout the user
        Auth::logout();

        // invalidate users session
        $request->session()->invalidate();

        // regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to home
        return redirect('/');
    }
}
