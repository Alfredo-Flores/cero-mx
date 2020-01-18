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

use App\ReturnHandler;
use Illuminate\Support\Facades\Auth;

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/', 'MainController@index')->name("index");

// Auth
Route::get('/register',  function () { return view('auth.register'); })->name("registerview");
Route::get('/login',  function () { return view('auth.login'); })->name("loginview");

Route::post('/Users/submit/register', 'UsersController@create')->name("register");
Route::post('/Users/submit/login', 'UsersController@login')->name("login");

Route::middleware("auth")->group(function () {
    Route::get('/Users/submit/logout', 'UsersController@logout')->name("logout");
    Route::get('/registeradvanced', function () {
        $id = Auth::user()->id;

        $tipentprs = \Tblentprs::fnoentusr($id);

        if ($tipentprs) {
            return view('welcome');
        }

        return view('auth.registerinstitution');

    })->name("registeradvancedview");
    Route::post('/postregisteradvanced', 'MainController@registeradvanced')->name("registeradvanced");
});


Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        session(['locale' => $locale]);
    }

    return back();
});

//Catgirorg Route
Route::get('/Catgirorg', 'CatgirorgController@index')->name('Catgirorg.main');
Route::post('/Catgirorg/fetch', 'CatgirorgController@loadtable')->name('Catgirorg.fetch');
Route::post('/Catgirorg/submit', 'CatgirorgController@create')->name('Catgirorg.submit');
Route::post('/Catgirorg/modify', 'CatgirorgController@update')->name('Catgirorg.modify');
Route::post('/Catgirorg/remove', 'CatgirorgController@destroy')->name('Catgirorg.remove');

//Cattipsrv Route
Route::get('/Cattipsrv', 'CattipsrvController@index')->name('Cattipsrv.main');
Route::post('/Cattipsrv/fetch', 'CattipsrvController@loadtable')->name('Cattipsrv.fetch');
Route::post('/Cattipsrv/submit', 'CattipsrvController@create')->name('Cattipsrv.submit');
Route::post('/Cattipsrv/modify', 'CattipsrvController@update')->name('Cattipsrv.modify');
Route::post('/Cattipsrv/remove', 'CattipsrvController@destroy')->name('Cattipsrv.remove');

//Tblentcln Route
Route::get('/Tblentcln', 'TblentclnController@index')->name('Tblentcln.main');
Route::post('/Tblentcln/fetch', 'TblentclnController@loadtable')->name('Tblentcln.fetch');
Route::post('/Tblentcln/submit', 'TblentclnController@create')->name('Tblentcln.submit');
Route::post('/Tblentcln/modify', 'TblentclnController@update')->name('Tblentcln.modify');
Route::post('/Tblentcln/remove', 'TblentclnController@destroy')->name('Tblentcln.remove');

//Tblentdnc Route
Route::middleware(['auth'])->group(function () {
    Route::get('/Tblentdnc', 'TblentdncController@index')->name('Tblentdnc.main');
    Route::post('/Tblentdnc/fetch', 'TblentdncController@loadtable')->name('Tblentdnc.fetch');
    Route::post('/Tblentdnc/submit', 'TblentdncController@create')->name('Tblentdnc.submit');
    Route::post('/Tblentdnc/modify', 'TblentdncController@update')->name('Tblentdnc.modify');
    Route::post('/Tblentdnc/request', 'TblentdncController@request')->name('Tblentdnc.request');
    Route::post('/Tblentdnc/finish', 'TblentdncController@finish')->name('Tblentdnc.finish');
    Route::post('/Tblentdnc/remove', 'TblentdncController@destroy')->name('Tblentdnc.remove');
});


//Tblentemp Route
Route::middleware(['auth'])->group(function () {
    Route::get('/Tblentemp', 'TblentempController@index')->name('Tblentemp.main');
    Route::post('/Tblentemp/submit', 'TblentempController@create')->name('Tblentemp.submit');
    Route::post('/Tblentemp/fetch', 'TblentempController@loadtable')->name('Tblentemp.fetch');
    Route::post('/Tblentemp/modify', 'TblentempController@update')->name('Tblentemp.modify');
    Route::post('/Tblentemp/remove', 'TblentempController@destroy')->name('Tblentemp.remove');
});


//Tblentorg Route
Route::middleware(['auth'])->group(function () {
    Route::get('/Tblentorg', 'TblentorgController@index')->name('Tblentorg.main');
    Route::post('/Tblentorg/fetch', 'TblentorgController@loadtable')->name('Tblentorg.fetch');
    Route::post('/Tblentorg/submit', 'TblentorgController@create')->name('Tblentorg.submit');
    Route::post('/Tblentorg/modify', 'TblentorgController@update')->name('Tblentorg.modify');
    Route::post('/Tblentorg/remove', 'TblentorgController@destroy')->name('Tblentorg.remove');
});


//Tblentprs Route
Route::get('/Tblentprs', 'TblentprsController@index')->name('Tblentprs.main');
Route::post('/Tblentprs/fetch', 'TblentprsController@loadtable')->name('Tblentprs.fetch');
Route::post('/Tblentprs/submit', 'TblentprsController@create')->name('Tblentprs.submit');
Route::post('/Tblentprs/modify', 'TblentprsController@update')->name('Tblentprs.modify');
Route::post('/Tblentprs/remove', 'TblentprsController@destroy')->name('Tblentprs.remove');

//Tblentsrv Route
Route::get('/Tblentsrv', 'TblentsrvController@index')->name('Tblentsrv.main');
Route::post('/Tblentsrv/fetch', 'TblentsrvController@loadtable')->name('Tblentsrv.fetch');
Route::post('/Tblentsrv/submit', 'TblentsrvController@create')->name('Tblentsrv.submit');
Route::post('/Tblentsrv/modify', 'TblentsrvController@update')->name('Tblentsrv.modify');
Route::post('/Tblentsrv/remove', 'TblentsrvController@destroy')->name('Tblentsrv.remove');

//Users Route
Route::get('/Users', 'UsersController@index')->name('Users.main');
Route::post('/Users/fetch', 'UsersController@loadtable')->name('Users.fetch');
Route::post('/Users/submit', 'UsersController@create')->name('Users.submit');
Route::post('/Users/modify', 'UsersController@update')->name('Users.modify');
Route::post('/Users/remove', 'UsersController@destroy')->name('Users.remove');

//TODO *CRUD Generator control separator line* (Don't remove this line!)

