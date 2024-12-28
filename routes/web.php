<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('user.home');
});


Route::get('/admin', function () {
    return view('Admin.dashboard');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/verification', function () {
    return view('auth.verification');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware('auth');

Route::post('/send-otp', [AuthController::class, 'sendOTP'])->middleware('throttle:5,1');
Route::post('/verify-otp', [AuthController::class, 'verifyOTP']);
// Route::post('/register',[UserController::class,"adminRegister"])->name("admin.register");

// Route::match(['get',"post"],'/admin-login',[UserController::class,"adminLogin"])->name("login");

// Route::post('/logout',[UserController::class,"logout"])->name("logout");