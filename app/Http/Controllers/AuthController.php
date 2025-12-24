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
        $username = $request->input('text_username');
        $password = $request->input('text_password');

        // get all ther users from the database
        // $users = User::all()->toArray();

        // as an objet instance of the models's class
        // $userModel = new User();
        // $users = $userModel->all()->toArray();

        // check if user exists
        $user = User::where('username', $username)
            ->where('deleted_at', NULL)
            ->first();
        // echo '<pre>';
        // print_r($user);

        if (!$user) {
            return redirect()
                ->back()
                ->withInput()
                ->with('loginError', 'Username ou password incorretos.');
        }


        // check if password is corret
        if (!password_verify($password, $user->password)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('loginError', 'Username ou password incorretos.');
        };

        //update last login 
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        //login user
        session([
            'user' => [
                'id' => $user->id,
                'usernsame' => $user->username
            ]
        ]);

        return redirect()->to('/');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->to('/login');
    }
}
