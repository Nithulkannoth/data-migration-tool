<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/employees/upload', [EmployeeController::class, 'showUploadForm'])->name('employees.upload.form');
Route::post('/employees/upload', [EmployeeController::class, 'upload'])->name('employees.upload');
Route::get('/employees/progress', [EmployeeController::class, 'progress'])->name('employees.progress');
