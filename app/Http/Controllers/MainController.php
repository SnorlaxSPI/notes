<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller
{
    public function index()
    {
        // load user's notes
        $id = session('user.id');
        $notes = User::find($id)->notes()->get()->toArray();

        // show home view
        return view('home', ['notes' => $notes]);
    }

    public function newNote()
    {
        echo "New note created!";
    }

    public function editNote($id)
    {
        try {
            // decrypt note id
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            // handle decryption error
            return redirect()->route('home')->with('error', 'Invalid note ID');
        }
        echo "Edit note with ID: $id";
    }

    public function deleteNote($id)
    {
        try {
            // decrypt note id
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            // handle decryption error
            return redirect()->route('home')->with('error', 'Invalid note ID');
        }
        echo "Delete note with ID: $id";
    }
}
