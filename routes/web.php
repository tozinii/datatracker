<?php

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


Route::get('/', 'HomeController@index')->name('home');

//Ruta de form-contacto
Route::post('/postContact', 'ContactController@postContact')->name('postContact');

Route::view('/about', 'about');
Route::view('/blog', 'blog');
Route::view('/contact', 'contact');
Route::view('/elements', 'elements');
Route::view('/services', 'services');


// Rutas auth:
Auth::routes(['verify' => true]);

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('loginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
//no sirve
 Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('registerForm');
Route::post('register', 'Auth\RegisterController@register')->name('register');
//Route::get('email/verify', 'Auth\VerificationController@show')->name('verification');
// Password Reset Routes...

//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
