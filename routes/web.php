<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

/* -------- Start of Auth Routes -------- */
Route::get('/user/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/user/register', 'Auth\RegisterController@register');
Route::post('/user/logout', 'Auth\LoginController@logout');
Route::get('/user/login', 'Auth\LoginController@showLoginForm');
Route::post('/user/login', 'Auth\LoginController@login');
/* -------- End of Auth Routes -------- */