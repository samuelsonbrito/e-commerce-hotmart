<?php

/************************************************************************************
 * Instrutor
 ************************************************************************************/
$this->group(['middleware' => 'auth'], function () {
    $this->get('cadastrar-curso', 'TeacherController@createCourse')->name('create.course');
    $this->post('cadastrar-curso', 'TeacherController@storeCourse')->name('store.course');

    $this->get('meus-cursos', 'TeacherController@courses')->name('teacher.courses');
    $this->any('meus-cursos-search', 'TeacherController@courseSearch')->name('teacher.courses.search');
    $this->get('curso-editar/{id}', 'TeacherController@editCourse')->name('teacher.course.edit');
    $this->post('atualizar-curso/{id}', 'TeacherController@updateCourse')->name('update.course');

    $this->get('curso/{id}', 'TeacherController@modulesCourse')->name('course-modules');
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

$this->get('curso/{url}', 'SchoolController@course')->name('course');
$this->get('/', 'SchoolController@index')->name('home');