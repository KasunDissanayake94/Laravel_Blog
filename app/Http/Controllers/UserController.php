<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(){
        return view('users',compact('username'));
    }
    public function register(Request $request){

      $this -> validate($request , [
        'name' => 'required|max:20',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'

      ]);

      $table = new User();

      $table->name = $request->input('name');
      $table->email = $request->input('email');
      $table->password = $request->input('password');

      $table->save();
      return redirect('login')->with('msg','Registered Successfully!');

    }
    public function login(Request $request){
        return $request->all();
    }
}
