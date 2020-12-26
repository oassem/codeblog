<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    function login()
    {
        return view('login');
    }

    function handlelogin(Request $request)
    {
        $cred = array('email' => $request->email, 'password' => $request->password);
        if (Auth::attempt($cred)) {
            return redirect('/posts');
        } else {
            return "not valid username and password!";
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
