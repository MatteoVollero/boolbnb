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

Route::get('/list', function () {
    return view('UPRA.Accomodation.index');
});

Route::get('/search', function () {
    return view('UI.Accomodations.search');
});

Route::get('/show', function () {
    return view('UI.Accomodations.show');
});

Route::get('/', 'AccomodationController@index');



Auth::routes();

// rotte ADMIN
Route::prefix('admin')->namespace('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('accomodations', 'AccomodationController');
});

// Route::get('/', 'HomeController@index')->name('home');

// rotte GUESTS
Route::resource('accomodations', 'AccomodationController');

// Route::get('/accomodations', 'AccomodationController@index')->name('accomodations.index');
// Route::get('/accomodations/{slug}', 'AccomodationController@show')->name('accomdations.show');

Route::get('/test-search', 'AccomodationController@showsearch')->name('showsearch');

