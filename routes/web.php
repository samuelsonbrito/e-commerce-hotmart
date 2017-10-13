<?php

/************************************************************************************
 * Instrutor
 ************************************************************************************/
$this->group(['middleware' => 'auth'], function () {
    $this->get('cadastrar-curso', 'TeacherController@createCourse')->name('create.course');
    $this->post('cadastrar-curso', 'TeacherController@storeCourse')->name('store.course');

    $this->get('meus-cursos', 'TeacherController@courses')->name('teacher.courses');
});

/************************************************************************************
 * Gestão de usuários
 ************************************************************************************/
$this->get('cadastrar', 'UserController@register');
$this->post('new-user', 'UserController@registring')->name('new-user');
$this->get('logout', 'UserController@logout');
$this->get('perfil', 'UserController@profile')->name('profile');
$this->post('profile-update', 'UserController@profileUpdate')->name('profile.update');
Auth::routes();

$this->get('/', 'SchoolController@index')->name('home');

/************************************************************************************
 * Gestão de cursos
 ************************************************************************************/
