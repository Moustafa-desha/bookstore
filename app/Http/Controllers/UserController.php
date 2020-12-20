<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    //

    

    function register(){
        return view('users/register');
    }
    function handleregister(Request $request){
        //register user 
        $user=new User();
        $user->email=$request->email;
        $user->password=\Hash::make($request->password);
        $user->save();
        return redirect('users/login');
    }
    function login(){
         return view('users/login');
    }
    function handlelogin(Request $request)
    {
        $cred=array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($cred))
        {
            return redirect('books');
        }else
        {
            return "not valid username and password";
        }
    }
    function logout(){
        Auth::logout();
        return redirect('users/login');
    }


}
