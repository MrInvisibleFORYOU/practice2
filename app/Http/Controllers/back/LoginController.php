<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function show(){
        return view('back.pages.auth.login');
    }

    public function forgetPassword(){
        return view('back.pages.auth.forgetPassword');
    }
    
    public function login(Request $request){
        $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    
    if (Auth::attempt($credentials)) {
        return redirect()->intended('/dashboard');
    } else {
        if(User::find($request->input('email'))){
            return redirect()->back()->withErrors([
            'email' => 'Invalid email',
        ]);
        }else{
            return redirect()->back()->withErrors([
            'password' => 'Invalid password',
        ]);
        }
       
    }
    }
}
