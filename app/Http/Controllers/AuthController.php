<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //login
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors(['Invalid credentials.']);
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', ['user' => $user]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

}
