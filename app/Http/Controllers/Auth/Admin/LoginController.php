<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('admin.auth.login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'email|required|exists:admins,email',
            'password' => 'required',
        ]);
        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->intended(route('admin'));
        }
        return back()->withInput($request->only('email'))->with('error', 'Email ou Mot de passe invalide');
    }

    public function Logout()
    {
        Session::forget('admin');
        Auth::logout();
        return \redirect()->route('home');
    }
}
