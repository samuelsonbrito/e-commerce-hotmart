<?php

$this->get('cadastrar', 'UserController@register');
$this->post('new-user', 'UserController@registring');
$this->get('logout', 'UserController@logout');
$this->get('perfil', 'UserController@profile')->name('profile');
$this->post('profile-update', 'UserController@profileUpdate')->name('profile.update');

$this->get('/', 'SchoolController@index')->name('home');

Auth::routes();