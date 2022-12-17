<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request){
        //validate data
        $request->validate([
            'email' =>'required',
            'password' =>'required'
        ]);

        //login code
        if(\Auth::attempt($request->only('email','password'))){

            return redirect('home');
           }
           return redirect('login')->withError('Sign In details are not valid, Please try again');





    }
    public function register_view(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email' =>'required|unique:users|email',
            'password' =>'required',
            'birthday'=>'required',
            'contact'=>'required',
            'house_no'=>'required',
            'postal_code'=>'required',
       ] );
       //save in user table
       User::create([

            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'email' =>$request->email,
            'password' =>\Hash::make($request->password),
            'birthday'=>$request->birthday,
            'contact'=>$request->contact,
            'house_no'=>$request->house_no,
            'postal_code'=>$request->postal_code,
       ]);
       if(\Auth::attempt($request->only('email','password'))){

        return redirect('home');
       }
       return redirect('register')->withError('Error');

    }


    public function home(){
        return view('home');
    }

    public function logout(){
        \Session::flush();
        \Auth::logout();
        return redirect('home');
    }
}

