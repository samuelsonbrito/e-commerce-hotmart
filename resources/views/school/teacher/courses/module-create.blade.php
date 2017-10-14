@extends('school.template.template')

@section('content')

    <section class="pg-form">
        <h1 class="titulo-form">{{$title}}</h1>

        @if(isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p style="text-align: center">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        {!! Form::open(['route'=>'modulos.store', 'class'=> 'form form-school']) !!}

        @include('school.teacher.courses.form-module')

        {!! Form::close() !!}
    </section>

@endsection
