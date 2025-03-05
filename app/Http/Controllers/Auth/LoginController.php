<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        // Prevent authenticated users from accessing the login page
        $this->middleware('guest')->except('logout');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle the login attempt
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');

        // If authentication is successful, redirect to the home page
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended('/home');  // Redirect to intended page (or home by default)
        }

        // If authentication fails, redirect back with an error message
        return redirect()->back()->withErrors(['email' => 'The provided credentials are incorrect.'])->withInput();
    }

    // Log the user out and redirect to login page
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');  // Redirect to the login page after logout
    }
}
