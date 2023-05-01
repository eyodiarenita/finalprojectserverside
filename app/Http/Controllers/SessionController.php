<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\support\Facades\Hash;

class SessionController extends Controller
{
    public function index(){
        return view("sesi/index");
    }

    public function login(Request $request){
        
        Session::flash('email', $request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email is required',
            'password.required'=>'Password is required',
        ]);

        $infologin = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if (Auth::attempt($infologin)) {
            //return redirect()->intended('/final');
            return redirect('final')->with('success', 'login successfully!');
        } else {
            return redirect('sesi')->withErrors('Email or password is incorrect');
        }
        
    }

    public function logout(){
        Auth::logout();
    
        return redirect('sesi')->with('success','logout successfully!');
    }

    public function register(){
        return view('sesi/register');
    }

    public function create(Request $request){
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ],[
            'name.required'=>'Name is required!',
            'email.required'=>'Email is required!',
            'email.email'=>'Please enter a valid email!',
            'email.unique'=>'Email already used, please enter another email!',
            'password.required'=>'Password is required!',
            'password.min'=>'The minimum password allowed is 6 characters.'
        ]);

        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ];
        user::create($data);

        $infologin = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if (Auth::attempt($infologin)) {
            //return redirect()->intended('/final');
            return redirect('final')->with('success', Auth::user()->name . "login successfully!");
        } else {
            return redirect('sesi')->withErrors('Email or password is incorrect');
        }
    }
}
