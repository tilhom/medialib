<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('profile','AvatarController@index')->name('profile');
Route::get('download/{media}','AvatarController@download')->name('download');
Route::resource('avatar','AvatarController');

Route::get('/home', 'HomeController@index')->name('home');
