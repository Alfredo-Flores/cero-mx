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


Route::get('/', 'MainController@index');
Route::get('/register', 'MainController@viewRegister');
Route::get('/login', 'MainController@viewLogin');
Route::post('/registerUser', 'MainController@registerUser');
Route::post('/loginUser', 'MainController@loginUser');

Route::get('/home', 'HomeController@index')->name('home');

// dev
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
