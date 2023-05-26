<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('signin');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'admin'){
                return redirect('/admin');
            }else {
                return redirect('/kasir');
            }
        }else{
            return redirect('/')->with([
                'incorrect' => 'Incorrect email or password!']);
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
