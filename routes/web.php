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

Route::get('/', 'HomeController@index')->name('home');
Route::get('home', function() { return redirect()->route('home'); });

// Admin part
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('users', 'UserController@index')->name('admin.users');
    Route::get('realty', 'RealtyObjectController@admin')->name('admin.realty');
    Route::get('content', 'AboutController@admin')->name('admin.content');
    Route::get('bookings','BookingController@admin')->name('admin.bookings');
});

// User part
Route::prefix('about')->group(function () {
    Route::get('/', 'AboutController@index')->name('about');
    Route::get('history', 'AboutController@history')->name('about.history');
    Route::get('service', 'AboutController@service')->name('about.service');
    Route::get('awards', 'AboutController@awards')->name('about.awards');
    Route::get('reviews', 'AboutController@reviews')->name('about.reviews');
});
Route::get('location', function() { return view('user.location'); })->name('location');
Route::get('sitemap', function() { return view('user.sitemap'); })->name('sitemap');

Route::get('realty', 'RealtyController@index')->name('realty');
Route::get('realty/booking', 'BookingController@form')->name('realty.booking');