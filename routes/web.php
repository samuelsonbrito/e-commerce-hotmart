<?php

$this->get('cadastrar', 'UserController@register');
$this->post('new-user', 'UserController@registring');
$this->get('logout', 'UserController@logout');

$this->get('/', 'SchoolController@index')->name('home');

Auth::routes();