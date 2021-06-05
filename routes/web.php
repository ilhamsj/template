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

Route::get('/auth/register', 'Web\User\Auth\RegisterController@index')->name('user.auth.register.index');
Route::post('/auth/register', 'Web\User\Auth\RegisterController@register')->name('user.auth.register');

Route::get('/auth/login', 'Web\User\Auth\LoginController@index')->name('user.auth.login.index');
Route::post('/auth/login', 'Web\User\Auth\LoginController@authenticate')->name('user.auth.login');
