<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticate(Request $request)
    {
        $credentials=$request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        
        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }


    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>'required|max:255',
            'username'=>['required','min:5', 'max:255', 'unique:users'],
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:8|max:255'
        ]);

        $validatedData['password']=Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration successfull! Please Login');

        return redirect('/login')->with('success', 'Registration successfull! Please Login');
    }
}
