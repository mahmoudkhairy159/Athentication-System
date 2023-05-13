<?php

use Illuminate\Support\Facades\Route;


Route::get('/login/admin', 'App\Http\Controllers\Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'App\Http\Controllers\Auth\LoginController@AdminLogin');
Route::get('/register/admin', 'App\Http\Controllers\Auth\RegisterController@showAdminRegisterForm');
Route::post('/register/admin', 'App\Http\Controllers\Auth\RegisterController@createAdmin');

Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::view('/dashboard', 'admins.dashboard');
});
