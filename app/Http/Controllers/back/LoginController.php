<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;

class LoginController extends Controller
{
    public function show(){
        return view('back.pages.auth.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    $remember = $request->filled('remember'); // Check if "Remember Me" checkbox is selected

    if (Auth::attempt($credentials,$remember)) {
        return redirect()->intended('/dashboard');
    } else {
        if (User::where('email', $request->input('email'))->first() == null) {
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

    public function logout()
{
    Auth::logout();
    session()->flush();
    return redirect('/');
}

    public function forgetPassword(){
        return view('back.pages.auth.forgetPassword');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $response = $this->broker()->sendResetLink(     //it will go to password.reset route(default byfacade password)
            $request->only('email')
        );

        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('status', 'We have emailed your password reset link!');
        }
        if($response === Password::INVALID_USER){
            return back()->withErrors(['email'=>"No Account found with this email Address"]);
        }
        return back()->withErrors(['email' => trans($response)]);
    }

    protected function broker()
    {
        return Password::broker();
    }

    //this will be used when user click on the link available in email of password reset.
    public function showResetForm(Request $request, $token = null)
    {
        return view('back.pages.auth.resetPassword')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $response = $this->broker()->reset(
            $request->only('email', 'password'),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        return $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($request, $response)
                    : $this->sendResetFailedResponse($request, $response);
    }
}
