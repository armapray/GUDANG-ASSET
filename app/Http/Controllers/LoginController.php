<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('login');
        }
    }

    public function loginaksi(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }

        return redirect('/')
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Email atau password salah']);
    }
    public function logoutaksi()
    {
        Auth::logout();
        return redirect('/');
    }
}

