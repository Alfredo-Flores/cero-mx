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

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

Route::get('/', 'MainController@index')->name("index");

Route::get('/register', 'MainController@registerView')->name("registerview");
Route::get('/login', 'MainController@loginView')->name("loginview");

Route::post('/postregister', 'MainController@register')->name("register");
Route::post('/postlogin', 'MainController@login')->name("login");


Route::middleware("auth")->group(function () {
    Route::get('/logout', 'MainController@logout')->name("logout");
    Route::get('/registeradvanced', 'MainController@registerAdvancedView')->name("registeradvancedview");
    Route::post('/postregisteradvanced', 'MainController@registeradvanced')->name("registeradvanced");
});

Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        session(['locale' => $locale]);
    }

    return back();
});

// dev
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
