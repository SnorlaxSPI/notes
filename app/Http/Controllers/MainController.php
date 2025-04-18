<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // load user's notes

        // show home view
        return view('home');
    }

    public function newNote()
    {
        echo "New note created!";
    }
}
