<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function login() {
        return view('login');
    }

    public function loginUser(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if($request->remember) {
            Cookie::queue('mycookie', $request->email, 60);// 60 itu brp lama cookie disimpan per menit.
        }

        if(Auth::attempt($credentials, true)) {
            return redirect()->back();
        }
        return 'fail';
    }

    public function logoutUser() {
        Auth::logout();
        return redirect('/login');
    }

}
