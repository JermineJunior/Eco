<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome') ;});
/** user routes */
Auth::routes();
Route::get('user/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/home', 'HomeController@index')->name('home');
/** admins   routes */

Route::prefix('/admin')->group(function () {
    Route::get('/login' , 'Auth\AdminLoginController@showLoginForm');
    Route::post('/login' , 'Auth\AdminLoginController@login')->name('admin.login');
    Route::get('/logout' , 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminsController@index')->name('admin.dash');
});

Route::get('/products', 'ProductController@index')->name('products');

