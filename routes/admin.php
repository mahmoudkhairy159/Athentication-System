<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login/admin', 'App\Http\Controllers\Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'App\Http\Controllers\Auth\LoginController@adminLogin');
Route::get('/register/admin', 'App\Http\Controllers\Auth\RegisterController@showAdminRegisterForm');
Route::post('/register/admin', 'App\Http\Controllers\Auth\RegisterController@createAdmin');
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\HomeController@indexAdmin');
    Route::get('/users', 'App\Http\Controllers\UserController@index')->name('users.index');
    Route::get('/editors', 'App\Http\Controllers\EditorController@index')->name('editors.index');
    Route::get('/admins', 'App\Http\Controllers\AdminController@index')->name('admins.index');
    Route::put('/changeUsersRole/{id}', 'App\Http\Controllers\AdminController@changeUsersRole')->name('admins.changeUsersRole');
    Route::put('/changeEditorsRole/{id}', 'App\Http\Controllers\AdminController@changeEditorsRole')->name('admins.changeEditorsRole');
});
