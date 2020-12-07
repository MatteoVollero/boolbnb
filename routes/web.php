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


  Auth::routes();

  // rotte ADMIN
  Route::prefix('admin')->namespace('admin')->name('admin.')->middleware('auth')->group(function () {
      // rotte ADVS
      Route::get('accomodations/adv_create/{id}', 'AccomodationController@adv_create')->name('accomodations.adv_create');
      Route::get('/accomodations/adv_store', 'AccomodationController@adv_store')->name('accomodations.adv_store');
      Route::get('/accomodations/adv_index', 'AccomodationController@adv_index')->name('accomodations.adv_index');
      // rotte MESSAGE
      Route::get('/accomodations/message_index', 'AccomodationController@message_index')->name('accomodations.message_index');
      Route::resource('accomodations', 'AccomodationController');
  });

  // Route::post('/logout', 'Auth\LoginController@logout');

  // rotte GUESTS
  // Route::resource('/', 'AccomodationController');
  // rotte UI
  Route::get('/', 'AccomodationController@index')->name('home');
  Route::get('/search', 'AccomodationController@search')->name('search');
  Route::get('/search/{type_id}', 'AccomodationController@search_type')->name('search_type');
  Route::get('/{slug}', 'AccomodationController@show')->name('show');
  // rotte MESSAGE
  Route::post('/accomodations/message_send', 'AccomodationController@message_send')->name('message_send');

  // Rotta TEST per mappe tom tom
  Route::get('/map', 'AccomodationController@map')->name('map');
