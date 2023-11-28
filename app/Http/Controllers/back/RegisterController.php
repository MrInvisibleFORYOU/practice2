<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show(){
        return view('back.pages.auth.register');
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ], [
        'password.confirmed' => 'The password and confirmation must match.',
    ]);
    if ($validator->fails()) {
        return redirect('register')
            ->withErrors($validator)
            ->withInput();
    }

    $user = new User([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
    ]);
    $user->save();

    // Additional logic like sending email verification, etc.

    return redirect()->route('welcome');
    }
}
