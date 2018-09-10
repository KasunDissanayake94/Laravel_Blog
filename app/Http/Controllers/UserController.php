<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

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
      return redirect('loginform')->with('msg','Registered Successfully!');

    }
    public function login(Request $request){
      $credentials = $request->only('email', 'password');

      if (Auth::attempt($credentials)) {
        return redirect()->route('home');
      }else{
        return redirect()->back()->with('msg','Login Failed!');
      }

    }
    public function home(){
      return view('home');
    }
}
