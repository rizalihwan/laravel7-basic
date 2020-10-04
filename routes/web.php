<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// All ROUTES
Route::prefix('posts')->middleware('auth')->group(function() {
    // user
    Route::resource('post', 'PostController')->except(['edit', 'update', 'destroy']);
    Route::get('/beranda', 'PostController@beranda')->name('post.beranda');

    // admin
    Route::get('/admin', 'PostController@admin')->name('post.admin');
    Route::get('/beri-nilai/{post:slug}', 'PostController@edit')->name('post.nilai');
    Route::patch('/update/{post:slug}', 'PostController@update')->name('post.update');
    Route::delete('/delete/{post:slug}', 'PostController@destroy')->name('post.delete');
});
