<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function proseslogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/main');
        }
        return redirect('/');
    }
    
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
