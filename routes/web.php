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

/* -------- Start of PostCreator -------- */
Route::group(['prefix' => 'postcreator', 'namespace' => 'postcreator', 'middleware' => 'postware'], function() {
    Route::get('/post/create', 'PostController@create');
});
/* -------- End of PostCreator -------- */

/* -------- Start of Backend -------- */
Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'member'], function() {

    /* -------- Start of Admin -------- */
    Route::get('/', 'AdminController@index');
    /* -------- End of Admin -------- */

    /* -------- Start of Users -------- */
    Route::get('/users', 'UserController@index');
    Route::get('/users/{id}/edit', 'UserController@edit');
    Route::post('/users/{id}/edit', 'UserController@update');
    /* -------- End of Users -------- */

    /* -------- Start of Roles -------- */
    Route::get('/roles', 'RoleController@index');
    Route::get('/roles/create', 'RoleController@create');
    Route::post('/roles/create', 'RoleController@store');
    /* -------- End of Roles -------- */

    /* -------- Start of Categories -------- */
    Route::get('/categories', 'CategoryController@index');
    Route::get('/categories/create', 'CategoryController@create');
    Route::post('/categories/create', 'CategoryController@store');
    Route::get('/categories/{id}/edit', 'CategoryController@edit');
    Route::post('/categories/{id}/edit', 'CategoryController@update');
    /* -------- End of Categories -------- */

});
/* -------- End of Backend -------- */
















