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

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/', function () {
    return view('welcome');
});

//Tblentemp Route
Route::get('/Tblentemp', 'TblentempController@index')->name('Tblentemp.main');
Route::post('/Tblentemp/fetch', 'TblentempController@loadtable')->name('Tblentemp.fetch');
Route::post('/Tblentemp/submit', 'TblentempController@create')->name('Tblentemp.submit');
Route::post('/Tblentemp/modify', 'TblentempController@update')->name('Tblentemp.modify');
Route::post('/Tblentemp/remove', 'TblentempController@destroy')->name('Tblentemp.remove');

//Tblentorg Route
Route::get('/Tblentorg', 'TblentorgController@index')->name('Tblentorg.main');
Route::post('/Tblentorg/fetch', 'TblentorgController@loadtable')->name('Tblentorg.fetch');
Route::post('/Tblentorg/submit', 'TblentorgController@create')->name('Tblentorg.submit');
Route::post('/Tblentorg/modify', 'TblentorgController@update')->name('Tblentorg.modify');
Route::post('/Tblentorg/remove', 'TblentorgController@destroy')->name('Tblentorg.remove');

//Tblentprs Route
Route::get('/Tblentprs', 'TblentprsController@index')->name('Tblentprs.main');
Route::post('/Tblentprs/fetch', 'TblentprsController@loadtable')->name('Tblentprs.fetch');
Route::post('/Tblentprs/submit', 'TblentprsController@create')->name('Tblentprs.submit');
Route::post('/Tblentprs/modify', 'TblentprsController@update')->name('Tblentprs.modify');
Route::post('/Tblentprs/remove', 'TblentprsController@destroy')->name('Tblentprs.remove');

//Users Route
Route::get('/Users', 'UsersController@index')->name('Users.main');
Route::post('/Users/fetch', 'UsersController@loadtable')->name('Users.fetch');
Route::post('/Users/submit', 'UsersController@create')->name('Users.submit');
Route::post('/Users/modify', 'UsersController@update')->name('Users.modify');
Route::post('/Users/remove', 'UsersController@destroy')->name('Users.remove');

//TODO *CRUD Generator control separator line* (Don't remove this line!)

