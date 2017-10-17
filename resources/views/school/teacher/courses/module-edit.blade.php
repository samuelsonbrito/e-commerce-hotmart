@extends('school.template.template')

@section('content')

    <section class="pg-form">

        <ol class="breadcrumb bread">
            <li><a href="{{route('teacher.courses')}}">Cursos</a></li>
            <li><a href="{{route('course.modules', $module->course_id)}}">{{$module->name}}</a></li>
            <li class="active">Editar módulo</li>
        </ol>

        <h1 class="titulo-form">{{$title}}</h1>

        @if(session('error'))
            <div class="alert alert-warning">
                {{session('error')}}
            </div>
        @endif

        @if(isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p style="text-align: center">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        {!! Form::model($module, ['route'=>['modulos.update', $module->id], 'class'=> 'form form-school', 'method'=>'PUT']) !!}

        @include('school.teacher.courses.form-module')

        {!! Form::close() !!}
    </section>

@endsection
