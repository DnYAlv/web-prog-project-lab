<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use COM;

class UserController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required|min:5|string|unique:users,name',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|alpha_num|min:6|confirmed'
        ]);

        $user = $request->except('password_confirmation');
        $user['image'] = 'test.jpg';
        $user['password'] = bcrypt($user['password']);

        User::create($user);
        return redirect('/login');
    }

    public function login(Request $request) {

        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($credentials)){
            if($request->remember){
                Cookie::queue('email', $request->email, 120);
                Cookie::queue('password', $request->passwoord, 120);
            }else{
                Cookie::queue(Cookie::forget('email'));
                Cookie::queue(Cookie::forget('password'));
            }

            // $request->session()->regenerate();
            return redirect('/movies');
        }

        return redirect('/login')->with('error', "Invalid email/password!");
    }

    public function logoutUser() {
        Auth::logout();
        return redirect('/login');
    }

}
