@extends('school.template.template')

@section('content')
    <section class="pg-form">

        <h1 class="title">Meu Perfil</h1>

        {{Form::model(auth()->user(), ['route'=>'profile.update', 'class'=>'form-horizontal', 'files'=> true ])}}

            @include('school.user.form')

        {{Form::close()}}
    </section>
@endsection
