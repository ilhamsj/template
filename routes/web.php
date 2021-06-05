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

    /*
    |--------------------------------------------------------------------------
    | BACKYARD
    |--------------------------------------------------------------------------
    */
    Route::group(["namespace" => "Admin", "prefix" => "backyard", "as" => "backyard."], function () {

        Route::group(["prefix" => "auth", "namespace" => "Auth", "as" => "auth."], function () {
            Route::get('/register', 'RegisterController@index')->name('register.index');
            Route::post('/register', 'RegisterController@register')->name('register');
            Route::get('/login', 'LoginController@index')->name('login.index');
            Route::post('/login', 'LoginController@authenticate')->name('login');
            Route::post('/logout', 'LoginController@logout')->name('logout');
        });

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    });

    /*
    |--------------------------------------------------------------------------
    | USER
    |--------------------------------------------------------------------------
    */
    Route::group(["namespace" => "User", "as" => "user."], function () {

        // auth
        Route::group(["prefix" => "auth", "namespace" => "Auth", "as" => "auth.", "middleware" => "guest"], function () {
            Route::get('/register', 'RegisterController@index')->name('register.index');
            Route::post('/register', 'RegisterController@register')->name('register');
            Route::get('/login', 'LoginController@index')->name('login.index');
            Route::post('/login', 'LoginController@authenticate')->name('login');
            Route::post('/logout', 'LoginController@logout')->name('logout');
        });

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    });

    /*
    |--------------------------------------------------------------------------
    | GUEST
    |--------------------------------------------------------------------------
    */
});
