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

        $valid = Auth::attempt([
            'email' => $request->email,
            'password'=>$request->password],
            $request->remember
        );

        if(!$valid) {
            return redirect()->back()->withErrors('Wrong Combination of Email or Password');
        }
        if($request->remember) {
            Cookie::queue("email", $request->email);
            Cookie::queue("password", $request->password);
        }
        else {
            Cookie::queue(Cookie::forget("email"));
            Cookie::queue(Cookie::forget("password"));
        }
        return redirect("/");
    }

    public function logoutUser() {
        Auth::logout();
        return redirect('/login');
    }

}
