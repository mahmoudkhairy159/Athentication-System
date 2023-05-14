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

Route::get('/login/editor', 'App\Http\Controllers\Auth\LoginController@showEditorLoginForm');
Route::post('/login/editor', 'App\Http\Controllers\Auth\LoginController@editorLogin');
Route::get('/register/editor', 'App\Http\Controllers\Auth\RegisterController@showEditorRegisterForm');
Route::post('/register/editor', 'App\Http\Controllers\Auth\RegisterController@createEditor');
Route::middleware(['auth:editor'])->prefix('editor')->group(function () {
    Route::view('/home', 'editors.home');
});
