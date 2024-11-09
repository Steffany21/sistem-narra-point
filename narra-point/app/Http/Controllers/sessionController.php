<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class sessionController extends Controller
{
    public function index()
    {
        return view('session.login');
    }

    public function login(Request $request)
    {
        Session::flash('username', $request->username);

        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ],[
            'username.required'=>'username is required',
            'password.required'=>'password is required',
        ]);

        $infologin = [
            'username'=>$request->username,
            'password'=>$request->password
        ];

        if(Auth::attempt($infologin)) {
            //kalau otentikasi sukses
            return redirect('dashboard')->with('success', 'Login successfully');
        } else {
            //kalau otentikasi gagal
            return redirect('login')->withErrors('Username and Password invalid');
        }
    }

    public function register() 
    {
        return view('session.register');
    }

    public function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('username', $request->username);
        Session::flash('email', $request->email);

        $request->validate([
            'name'=>'required',
            'username'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8'
        ],[
            'name.required'=>'name is required',
            'username.required'=>'username is required',
            'email.required'=>'email is required',
            'email.email'=>'please enter a valid email',
            'password.required'=>'password is required',
            'password.min'=>'password must be at least 8 character'
        ]);

        $data = [
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ];
        
        User::create($data);
        return redirect('login')->with('success', 'Register successfully');
    
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login')->with('success', 'Logout successfully');    
    }

}
