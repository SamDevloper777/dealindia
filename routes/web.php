<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home');
});


Route::get('/admin', function () {
    return view('Admin.dashboard');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

// Route::post('/register',[UserController::class,"adminRegister"])->name("admin.register");

// Route::match(['get',"post"],'/admin-login',[UserController::class,"adminLogin"])->name("login");

// Route::post('/logout',[UserController::class,"logout"])->name("logout");