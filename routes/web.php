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

// Admin part
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin');

    Route::get('news', 'NewsController@indexAdmin')->name('admin.news');
    Route::get('news/{post}', 'NewsController@edit')->name('admin.news.show');
    Route::put('news/{post}', 'NewsController@update')->name('admin.news.update');
    Route::delete('news/{post}', 'NewsController@destroy')->name('admin.news.delete');

    Route::get('realty', 'RealtyObjectController@indexAdmin')->name('admin.realty');

    Route::get('staticContent', 'StaticContentController@index')->name('admin.staticContent');

    Route::get('booking', 'BookingController@index')->name('admin.booking');

    Route::get('users', 'UserController@index')->name('admin.users');
    Route::get('users/{user}', 'UserController@edit')->name('admin.users.show');
    Route::put('users/{user}', 'UserController@update')->name('admin.users.update');
    Route::delete('users/{user}', 'UserController@destroy')->name('admin.users.delete');
});

// User part
Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index');
Route::get('news', 'NewsController@index')->name('news');
Route::get('news/{post}', 'NewsController@show')->name('post');

Route::prefix('realty')->group(function () {
    Route::get('/', 'RealtyObjectController@index')->name('realty');
    Route::get('{type}', 'RealtyObjectController@indexOfType')->name('realty.ofType');

//    Route::get('booking', 'BookingController@form')->name('realty.booking');
});

Route::prefix('about')->group(function () {
    Route::get('/', 'AboutController@index')->name('about');
    Route::get('history', 'AboutController@history')->name('about.history');
    Route::get('service', 'AboutController@service')->name('about.service');
    Route::get('awards', 'AboutController@awards')->name('about.awards');
    Route::get('reviews', 'AboutController@reviews')->name('about.reviews');
});

Route::get('location', function() { return view('user.location'); })->name('location');
Route::get('sitemap', function() { return view('user.sitemap'); })->name('sitemap');

?>