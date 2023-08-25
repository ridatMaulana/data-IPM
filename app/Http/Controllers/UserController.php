<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/responden');
        } else {
            return back()->withErrors(['email' => 'Login failed.']);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
