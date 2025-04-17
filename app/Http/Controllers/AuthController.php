<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        // form validation
        $request->validate(
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16',
            ],
            // error messages
            [
                'text_username.required' => 'O username é obrigatório',
                'text_username.email' => 'Username deve ser um email válido',
                'text_password.required' => 'A senha é obrigatória',
                'text_password.min' => 'A senha deve ter no mínimo :min caracteres',
                'text_password.max' => 'A senha deve ter no máximo :max caracteres',
            ]
        );

        // get user input
        $username = $request->input('username');
        $password = $request->input('password');

        // get all the users from the database
        $userModel = new User();
        $users = $userModel->all()->toArray();
        echo '<pre>';
        print_r($users);

        // test database connection 
        try {
            DB::connection()->getPdo();
            echo 'Database connection successful<br>';
        } catch (\PDOException $e) {
            echo 'Database connection failed: ' . $e->getMessage();
        }

        echo "FIM!";
    }

    public function logout()
    {
        echo 'Logout';
    }
}
