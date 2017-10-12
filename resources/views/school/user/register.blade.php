@extends('school.template.template')

@section('content')
    <section class="pg-form">

        <h1 class="title">Cadastre-se</h1>

        {{Form::open(['route'=>'new-user', 'class'=>'form-horizontal', 'files'=> true ])}}

        @include('school.user.form')

        <div class="form-group">
            <div class="col-md-12">
                <button type="submit" class="btn btn-form">
                    Cadastrar
                </button>
                <a class="btn btn-link" href="{{ url('login') }}">
                    Entrar
                </a>
            </div>
        </div>

        {{Form::close()}}

    </section>
@endsection
