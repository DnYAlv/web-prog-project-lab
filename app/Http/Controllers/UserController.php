<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request){

        $rules = [
            'name' => 'required|min:5|string|unique:users,name',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|alpha_num|min:6|confirmed'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect('/login');
    }

    public function login(Request $request) {

        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $valid = Auth::attempt($credentials, true);

        if(!$valid) {
            return redirect()->back()->with('error', 'Wrong Combination of Email and Password');
        }else{
            if($request->remember) {
                Cookie::queue("email", $request->email,120);
                Cookie::queue("password", $request->password,120);
            }
            else {
                Cookie::queue(Cookie::forget("email"));
                Cookie::queue(Cookie::forget("password"));
            }
        }
        return redirect("/");
    }

    public function editProfile(){
        $user = User::find(Auth::id());
        return view('user.edit_profile', ['user' => $user]);
    }

    public function update(Request $request){

        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'date_of_birth' => 'required|date',
            'phone' => 'required|min:5|max:13',
            'image' => 'nullable|string'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $data = $request->only(['name','email','date_of_birth','phone']);
        $user = User::find(Auth::id());

        if ($request->image) {
            $data['image'] = $request->image;
        }

        $user->update($data);

        return redirect('/profile');
    }


    public function logoutUser(Request $request) {
        Auth::logout();
        $request->session()->invalidate();

        return redirect('/login');
    }

}
