<?php

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'UserController@userJson');
Route::put('/user/{id}', 'UserController@update');
Route::resource('/birds', 'BirdController');
