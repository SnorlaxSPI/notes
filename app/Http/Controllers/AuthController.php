<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        echo 'Login';
    }

    public function logout()
    {
        echo 'Logout';
    }
}
