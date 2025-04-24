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
        $id = $this->decryptId($id);
        echo "Edit note with ID: $id";
    }

    public function deleteNote($id)
    {
        $id = $this->decryptId($id);
        echo "Delete note with ID: $id";
    }

    public function decryptId($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->route('home');
        }
        echo "Decrypted note ID: $id";
    }
}
