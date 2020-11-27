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
Route::get('/logout',function() { 
     return view('home');
    });
    Auth::routes();
    // rotte ADMIN
    Route::prefix('admin')->namespace('admin')->name('admin.')->middleware('auth')->group(function () {
            Route::resource('accomodations', 'AccomodationController');
        });
            // rotte GUESTS
            Route::resource('/', 'AccomodationController');
