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


Route::group(["namespace" => "Web"], function () {

    Route::group(["namespace" => "User"], function () {
        Route::group(["prefix" => "auth", "namespace" => "Auth"], function () {
            Route::get('/register', 'RegisterController@index')->name('user.auth.register.index');
            Route::post('/register', 'RegisterController@register')->name('user.auth.register');
            Route::get('/login', 'LoginController@index')->name('user.auth.login.index');
            Route::post('/login', 'LoginController@authenticate')->name('user.auth.login');
        });
    });

    Route::group(["namespace" => "Admin", "prefix" => "backyard"], function () {
        Route::group(["prefix" => "management"], function () {
            Route::get('/user', 'UserController@index')->name('admin.user.index');
        });
    });
});
