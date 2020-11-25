<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home','UI\AccomodationController@index');
Route::get('/UPRA/create','UPRA\AccomodationController@create')->name('create');
Route::post('/UPRA/store','UPRA\AccomodationController@store')->name('store');
Route::get('/UPRA/edit/{id}','UPRA\AccomodationController@edit')->name('edit');
Route::put('/UPRA/update/{id}','UPRA\AccomodationController@update')->name('update');


