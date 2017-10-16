@extends('school.template.template')

@section('content')

    <section class="pg-form">

        <a href="{{URL::previous()}}">
            Back <span class="glyphicon glyphicon-backward"></span>
        </a>

        <h1 class="titulo-form">{{$title}}</h1>

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
