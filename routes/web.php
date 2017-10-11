<?php

$this->get('/', 'SchoolController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
