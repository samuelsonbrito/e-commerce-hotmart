<?php

/************************************************************************************
 * Middleware Auth - Somente Pessoas autenticadas tem acesso
 ************************************************************************************/
$this->group(['middleware' => 'auth'], function () {
    $this->get('cadastrar-curso', 'TeacherController@createCourse')->name('create.course');
    $this->post('cadastrar-curso', 'TeacherController@storeCourse')->name('store.course');
    $this->get('meus-cursos', 'TeacherController@courses')->name('teacher.courses');
    $this->any('meus-cursos-search', 'TeacherController@courseSearch')->name('teacher.courses.search');
    $this->get('curso-editar/{id}', 'TeacherController@editCourse')->name('teacher.course.edit');
    $this->put('atualizar-curso/{id}', 'TeacherController@updateCourse')->name('update.course');
    $this->delete('curso/deletar/{id}', 'TeacherController@destroyCourse')->name('course.destroy');

    $this->get('curso/{id}/modulos', 'ModuleController@byCourseId')->name('course.modules');
    $this->resource('modulos', 'ModuleController', ['except' => 'index']);

    $this->get('modulo/{id}/aulas', 'LessonController@byModuleId')->name('module.lessons');
    $this->resource('aulas', 'LessonController', ['except' => 'index']);

    $this->get('minhas-compras', 'SchoolController@myCourses')->name('sales');

    $this->get('minhas-vendas', 'TeacherController@mySales')->name('my.sales');
    $this->get('meus-alunos', 'TeacherController@myStudents')->name('my.students');
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

$this->get('pedido-realizado', 'SchoolController@success')->name('success');
$this->get('usuario/{url}', 'SchoolController@user')->name('user');
$this->get('aula/{url}', 'SchoolController@lesson')->name('lesson');
$this->any('curso-pesquisar', 'SchoolController@search')->name('course.search');
$this->get('curso/{url}', 'SchoolController@course')->name('course');
$this->get('/', 'SchoolController@index')->name('home');