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

        <div class="form-group">
            {!! Form::select('course_id', $courses, $curso_atual, ['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nome:']) !!}
        </div>
        <div class="form-group">
            {!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Descrição:']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Enviar', ['class'=>'btn btn-form']) !!}
        </div>

        {!! Form::close() !!}
    </section>

@endsection
