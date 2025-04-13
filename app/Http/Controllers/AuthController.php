<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        // form validation
        $request->validate([
            'text_username' => 'required',
            'text_password' => 'required',
        ]);

        // get user input
        $username = $request->input('username');
        $password = $request->input('password');

        echo 'OK!';
    }

    public function logout()
    {
        echo 'Logout';
    }
}
