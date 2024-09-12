<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;

Route::get('register', function () {
    return view('auth.register');
})->name('user.register');

Route::post('register', [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->group(function () {
    // Dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Employee routes
    Route::get('/employees/upload', [EmployeeController::class, 'showUploadForm'])->name('employees.upload.form');
    Route::post('/employees/upload', [EmployeeController::class, 'upload'])->name('employees.upload');
    Route::get('/employees/progress', [EmployeeController::class, 'progress'])->name('employees.progress');

    Route::resource('departments', DepartmentController::class);
    Route::resource('designations', DesignationController::class);
});

Route::get('', function () {
    return view('auth.login');  
})->name('login');

Route::post('login', [AuthController::class, 'login']);
