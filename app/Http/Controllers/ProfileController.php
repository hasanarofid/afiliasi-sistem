<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class ProfileController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $member =  User::find($id);
        // dd($id);
         return view('profile.index',compact('member'));
    }

     public function edit($id,Request $request){
        // dd($request);
          $imagepath = $request->foto->store('profile','public');
    // dd($imagepath);
            $id = Auth::user()->id;
            $member =  User::find($id);
            $member->profile_photo_path = $imagepath;
            $member->phone = request('phone');
            $member->name = request('name');

            $member->save();
         return redirect()->route('profile.index')->with('success','Successfully update the profile!');

     }
}
