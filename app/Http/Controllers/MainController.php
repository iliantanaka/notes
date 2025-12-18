<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function index($value)
    {
        return view('main', ['value' => $value]);

        // return view('main')->with('value', $value);
    }

    function pagina2($value)
    {
        return view('pagina2')->with('value', $value);
    }

    function pagina3($value)
    {
        return view('pagina3')->with('value', $value);
    }
}
