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
            'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]*$/|min:6|confirmed'
        ];

        $messages = [
            'password.regex' => "The password must contain both alphabetical and numerical characters"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

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
                Cookie::queue("email", $request->email);
                Cookie::queue("password", $request->password);
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
            'name' => 'required|min:5|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'date_of_birth' => 'required|date',
            'phone' => 'required|min:5|max:13',
            'image' => 'string'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $data = $request->all();
        $user = User::find(Auth::id());
        $user->update($data);

        return redirect('/profile');
    }

    public function logoutUser() {
        Auth::logout();
        return redirect('/login');
    }

}
