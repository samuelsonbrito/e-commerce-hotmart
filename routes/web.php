<?php

$this->get('cadastrar', 'UserController@register');
$this->get('logout', 'UserController@logout');

$this->get('/', 'SchoolController@index')->name('home');


Auth::routes();