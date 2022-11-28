<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('home');
});

//only guest access to this route
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest'); 
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

//only authenticated user access to this route
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth');

//only guest access to this route
Route::get('/login', [LoginController::class, 'create'])->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');

