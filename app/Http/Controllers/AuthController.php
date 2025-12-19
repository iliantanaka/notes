<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

                'text_username' => 'required',
                'text_password' => 'required'
            ]
        );
        // dump and die
        // dd($request);
        echo $request->input('text_username');
        echo '<br>';
        echo $request->input('text_password');
    }
}
