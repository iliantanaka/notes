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
    public function logout()
    {
        echo 'Logout';
    }
    public function loginSubmit(Request $request)
    {
        $request->validate(
            [

                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16',
            ],
            [
                'text_username.required' => 'O usurname é obrigatório',
                'text_username.email' => 'Username deve ser um email válido',
                'text_password.required' => 'A password é obrigatória',
                'text_password.min' => 'A password deve ter pelo menos :min caracteres',
                'text_password.max' => 'A password deve ter no máximo :max caracteres',
            ]
        );
        // dump and die
        // dd($request);

        // get user input
        echo $request->input('text_username');
        echo '<br>';
        echo $request->input('text_password');
        echo '<br>';

        // get all ther users from the database
        // $users = User::all()->toArray();

        // as an objet instance of the models's class
        $userModel = new User();
        $users = $userModel->all()->toArray();

        echo '<pre>';
        print_r($users);

        echo 'FIM';
    }
}
