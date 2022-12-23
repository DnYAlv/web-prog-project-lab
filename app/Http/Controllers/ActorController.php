<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ActorController extends Controller
{
    public function index(){
        return view('actor.index');
    }

    public function create(){
        return view('actor.create_actor');
    }

    public function store(Request $request){
        $rules = [
            'name' => 'required|string|min:3',
            'gender' => 'required|in:Male, Female',
            'biography' => 'required|string|min:10',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|string',
            'image_url' => 'required|image',
            'popularity' => 'required|numeric'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $data = $request->all();

        $image = $request->file('image_url');
        $ext = $image->getClientOriginalExtension();
        $image_name = 'actor_img'.time().'.'.$ext;

        Storage::putFileAs('public/images/actor/', $image, $image_name);

        Actor::create($data);
        return redirect('/actors');
    }

    public function edit($id){
        $actor = Actor::where('id', $id)->first();

        return view('actor.edit_actor', ['actors' => $actor]);
    }

    public function update(Request $request, $id){
        $rules = [
            'name' => 'required|string|min:3',
            'gender' => 'required|in:Male, Female',
            'biography' => 'required|string|min:10',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|string',
            'image_url' => 'image',
            'popularity' => 'required|numeric'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $data = $request->all();
        $actor = Actor::where('id', $id)->first();

        if($request->file('image_url')){
            Storage::delete('public/images/actor/'.$actor->image_url);
            $image = $request->file('image_url');
            $ext = $image->getClientOriginalExtension();
            $image_name = 'actor_img'.time().'.'.$ext;
            Storage::putFileAs('public/images/actor/', $image, $image_name);
            $data['image_url'] = $image_name;
        }

        $actor->update($data);
        return redirect('/actors/'.$actor->id);
    }

    public function delete($id){
        $actor = Actor::where('id', $id)->first();

        if($actor->movies()->count()){
            return redirect('/actors/'.$actor->id)->with('error', 'This Actor, '.$actor->name.' can\'t be deleted since this actor is in the '.$actor->movies()->first()->title.' movie');
        }

        Storage::delete('public/images/actor/'.$actor->image_url);
        Actor::where('id', $id)->delete();

        return redirect('/actors');
    }
}
