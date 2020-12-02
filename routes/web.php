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

// Lo utilizziamo per debug
Route::get('/logout',function(){
  return view('home');
});

Route::get('/admin/show',function(){
  return view('UPRA.Accomodations.show');
});


Auth::routes();

// rotte ADMIN
Route::prefix('admin')->namespace('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('accomodations', 'AccomodationController');
});

// Route::post('/logout', 'Auth\LoginController@logout');

// rotte GUESTS
Route::resource('/', 'AccomodationController');
Route::get('/search', 'AccomodationController@search')->name('search');
Route::get('/show/{slug}', 'AccomodationController@show')->name('show');
// Rotta TEST per mappe tom tom
Route::get('/map', 'AccomodationController@map')->name('map');

// Route::get('/accomodations', 'AccomodationController@index')->name('accomodations.index');
// Route::get('/accomodations/{slug}', 'AccomodationController@show')->name('accomdations.show');


// UI: ROTTE TEST PER BACK-END
// Route::get('/home','UI\AccomodationController@index');

// UPRA
// Rotte di test per back-end

// CREATE
// Route::get('/UPRA/create','UPRA\AccomodationController@create')->name('create'); // @create
// Route::post('/UPRA/store','UPRA\AccomodationController@store')->name('store'); // @store
// READ
// Route::get('/UPRA/home','UPRA\AccomodationController@index')->name('home'); // @index
// Route::get('/UPRA/show/{id}','UPRA\AccomodationController@show')->name('show'); // @show
// UPDATE
// Route::get('/UPRA/edit/{id}','UPRA\AccomodationController@edit')->name('edit'); // @edit
// Route::put('/UPRA/update/{id}','UPRA\AccomodationController@update')->name('update'); // @update
// DELETE
// Route::delete('/UPRA/destroy/{id}','UPRA\AccomodationController@destroy')->name('destroy'); // @destroy
