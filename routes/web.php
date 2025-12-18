<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    echo 'About us page';
});

Route::get('/main/{value}', [MainController::class, 'index']);
Route::get('/pagina2/{value}', [MainController::class, 'pagina2']);
Route::get('/pagina3/{value}', [MainController::class, 'pagina3']);
