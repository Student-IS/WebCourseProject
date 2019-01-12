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
    Route::get('news/create', 'NewsController@create')->name('admin.news.create');
    Route::get('news/{post}', 'NewsController@edit')->name('admin.news.showEdit');
    Route::post('news', 'NewsController@store')->name('admin.news.store');
    Route::put('news/{post}', 'NewsController@update')->name('admin.news.update');
    Route::delete('news/{post}', 'NewsController@destroy')->name('admin.news.delete');

    Route::get('realty', 'RealtyObjectController@indexAdmin')->name('admin.realty');
    Route::get('realty/create', 'RealtyObjectController@create')->name('admin.realty.create');
    Route::get('realty/{object}', 'RealtyObjectController@edit')->name('admin.realty.edit');
    Route::post('realty', 'RealtyObjectController@store')->name('admin.realty.store');
    Route::put('realty/{object}','RealtyObjectController@update')->name('admin.realty.update');
    Route::delete('realty/{object}','RealtyObjectController@destroy')->name('admin.realty.delete');

    Route::delete('realty/img/{image}', 'RealtyImageController@destroy')->name('admin.realty.image.delete');

    Route::get('about', 'AboutController@edit')->name('admin.staticContent.edit');

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
    Route::get('{object}', 'RealtyObjectController@show')->name('realty.show');
    Route::get('book/{object}', 'BookingController@store')->name('realty.book');
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