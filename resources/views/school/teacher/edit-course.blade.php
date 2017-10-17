@extends('school.template.template')

@section('content')

    <section class="pg-form">

        {!! Form::open(['route' => ['course.destroy', $course->id], 'class'=>'form form-school', 'method'=>'DELETE']) !!}
        {!! Form::submit('Deletar Curso?',['class'=>'btn btn-danger']) !!}
        {!! Form::close() !!}

        <h1 class="titulo-form">Editar: {{$course->name}}</h1>

        @if(session('error'))
            <div class="alert alert-warning">
                {{session('error')}}
            </div>
        @endif

        @if(isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        {!! Form::model($course, ['route'=> ['update.course', $course->id], 'class'=> 'form form-school', 'files' => true, 'method'=>'put']) !!}

        @include('school.teacher.form-course')

        {!! Form::close() !!}
    </section>

@endsection