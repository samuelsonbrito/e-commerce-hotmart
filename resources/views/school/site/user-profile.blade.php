@extends('school.template.template')

@section('content')

    <section class="detalhes-curso">

        <div class="container">

            <div class="col-md-7">
                <h1 class="titulo-curso">{{$user->name}}</h1>
                <h1 class="descricao-curso">{{$user->email}}</h1>
                <h2 class="descricao-curso">{{$user->bibliography}}</h2>
            </div>

            <div class="col-md-5 text-center">
                @if( $user->image != '')
                    <img src="{{url("uploads/users/".$user->image)}}" alt="{{$user->name}}"
                         class="img-aluno-detalhe img-circle">
                @else
                    <img src="{{url('assets/img/profile.png')}}" alt="{{$user->name}}"
                         class="img-aluno-detalhe img-circle">
                @endif
            </div>
        </div>

    </section><!--Detalhes Curso-->



@endsection
