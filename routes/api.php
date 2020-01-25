<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post("auth/register", "UsersController@create");
Route::post('auth/login', 'UsersController@login');
Route::get('auth/user', 'UsersController@user');
Route::get('auth/userdata', 'UsersController@userdata');
Route::post("auth/registerinstitution", 'TblentprsController@create');


Route::group(['middleware' => 'jwt.auth'], function(){
    Route::post('auth/logout', 'UsersController@logout');
});

Route::group(['middleware' => 'jwt.refresh'], function(){
    Route::get('auth/refresh', 'UsersController@refresh');
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
    Route::get('/Tblentdnc', 'TblentdncController@index')->name('Tblentdnc.main');
    Route::post('/Tblentdnc/fetch', 'TblentdncController@table')->name('Tblentdnc.fetch');
    Route::post('/Tblentdnc/list', 'TblentdncController@list')->name('Tblentdnc.list');
    Route::post('/Tblentdnc/submit', 'TblentdncController@create')->name('Tblentdnc.submit');
    Route::post('/Tblentdnc/modify', 'TblentdncController@update')->name('Tblentdnc.modify');
    Route::post('/Tblentdnc/request', 'TblentdncController@request')->name('Tblentdnc.request');
    Route::post('/Tblentdnc/refuse', 'TblentdncController@refuse')->name('Tblentdnc.refuse');
    Route::post('/Tblentdnc/finish', 'TblentdncController@finish')->name('Tblentdnc.finish');
    Route::post('/Tblentdnc/remove', 'TblentdncController@destroy')->name('Tblentdnc.remove');


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
