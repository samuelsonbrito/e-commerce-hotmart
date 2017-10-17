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

        @if(isset($lesson))
            {!! Form::model($lesson, ['route'=>['aulas.update', $lesson->id], 'class'=> 'form form-school', 'method' => 'put']) !!}
        @else
            {!! Form::open(['route'=>'aulas.store', 'class'=> 'form form-school']) !!}
        @endif
        <div class="form-group">
            {!! Form::select('module_id', $modules, $modulo_atual,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
        </div>
        <div class="form-group">
            {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Url:']) !!}
        </div>
        <div class="form-group">
            {!! Form::text('video', null, ['class' => 'form-control', 'placeholder' => 'Vídeo:']) !!}
        </div>
        <div class="form-group">
            <label>
                Free?
                {!! Form::checkbox('free', '1') !!}
            </label>
        </div>
        <div class="form-group">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição:']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Enviar', ['class' => 'btn btn-form']) !!}
        </div>


        {!! Form::close() !!}
    </section>

@endsection
