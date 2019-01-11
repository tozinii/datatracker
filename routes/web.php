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


Route::get('/', function ()
{
  return view('index');
})->name('root');


// Multi idioma

Route::get('welcome/{locale}', function ($locale) {
    App::setLocale($locale);

    //
});

// Ruta de form-contacto
Route::post('/postContact', 'ContactController@postContact')->name('postContact');

Route::view('/about', 'templates/about');
Route::view('/blog', 'templates/blog');
Route::view('/contact', 'templates/contact');
Route::view('/elements', 'templates/elements');
Route::view('/services', 'templates/services');

// Rutas a vistas usuarios y admins
Route::view('/common', 'users/common');
Route::get('/admin', 'AdminController@userList')->middleware('auth')->name('admin');
Route::get('/profile', 'ProfileController@show')->name('profile');
Route::post('/password/change', 'ProfileController@changePassword')->name('changePassword');
Route::post('/profile/{profile}/edit', 'ProfileController@edit')->name('profile.edit');
Route::view('/groups', 'users/groups')->middleware(['auth','verified']);
Route::view('/cars', 'users/cars')->middleware(['auth','verified']);
Route::view('/sensors', 'users/sensors')->middleware(['auth','verified']);


// Rutas auth:
Auth::routes(['verify' => true]);

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('loginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
// no sirve
 Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('registerForm');
Route::post('register', 'Auth\RegisterController@register')->name('register');

// Verify email
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

//Admin panel
Route::get('/adminpanel', 'AdminController@adminPanel')->name('admin');
