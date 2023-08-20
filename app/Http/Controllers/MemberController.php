<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class MemberController extends Controller
{
      //index
    public function index(){
        $models = User::where('role','Member')->get();
        return view('member.index',compact('models'));
    }
}
