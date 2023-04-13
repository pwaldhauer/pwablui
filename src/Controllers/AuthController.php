<?php

namespace PwaBlui\Controllers;

class AuthController
{
    public function login()
    {
        return view('auth.login');
    }

    public function auth()
    {
        $credentials = request()->only('username', 'password');
        if (auth()->attempt($credentials, true)) {
            return redirect()->intended(route('home'));
        }

        return redirect()->back()->with('error', 'Login failed');
    }
}
