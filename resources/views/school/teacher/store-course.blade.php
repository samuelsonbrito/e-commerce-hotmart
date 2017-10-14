@extends('school.template.template')

@section('content')

    <section class="pg-form">
        <h1 class="titulo-form">Cadastrar Novo Curso</h1>

        @if(isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p style="text-align: center">{{ $error }}</p>
                @endforeach
            </div>
        @endif


        {!! Form::open(['route'=>'store.course', 'class'=> 'form form-school', 'files' => true]) !!}

        @include('school.teacher.form-course')

        {!! Form::close() !!}
    </section>

@endsection
