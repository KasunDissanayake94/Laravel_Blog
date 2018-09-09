<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('users',compact('username'));
    }
    public function login(Request $request){
        return $request->all();
    }
}
