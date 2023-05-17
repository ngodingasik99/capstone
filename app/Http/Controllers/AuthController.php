<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        return view('login');
    }

    public function doLogin(Request $request) {
        $credentials = $request->validate([
            'email'=> ['required', 'string', 'max:100', 'email'],
            'password'=> ['required', Rules\Password::default()],
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email dan Password salah.'
        ])->onlyInput('email');
    }

}
