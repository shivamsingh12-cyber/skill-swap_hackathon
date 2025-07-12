<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

  public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (auth()->attempt($credentials)) {
        //  just redirect
        return redirect()->route('homepage');
    }

    //  Invalid login
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

    public function forgotPassword(Request $request)
    {
            return view('auth.password_update');
    }

public function updatePassword(Request $request)
{
    // Validate the request data
    $request->validate([
        'email' => 'required|string|email|exists:users,email|max:255',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Find the user by email
    $user = User::where('email', $request->email)->first();

    // Update the user's password
    $user->password = Hash::make($request->password);
    $user->save();

    // Redirect to login with success message
    return redirect()->route('login')->with('status', 'Password updated successfully.');
}

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
