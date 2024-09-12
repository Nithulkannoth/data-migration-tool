<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::get('register', function () {
    return view('auth.register');
});

Route::post('register', [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->get('/dashboard', function () {
    return view('dashboard');  
})->name('dashboard');

Route::get('', function () {
    return view('auth.login');  
})->name('login');

Route::post('login', [AuthController::class, 'login']);