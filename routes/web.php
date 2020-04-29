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

Auth::routes();
Route::get('user/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('/admin')->group(function () {
    Route::get('/login' , 'Auth\AdminLoginController@showLoginForm');
    Route::post('/login' , 'Auth\AdminLoginController@login')->name('admin.login');
    Route::get('/logout' , 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminsController@index')->name('admin.dash');
});

