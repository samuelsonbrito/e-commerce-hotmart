@extends('school.template.template')

@section('content')

    <h1 class="title">{{$title}}</h1>

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

    @forelse($courses as $course)
        <article class="col-md-3 col-sm-6 col-xm-12">
            <div class="course">

                @if($course->image == null)
                    <img src="{{url("assets/img/sem-imagem.jpg")}}" alt="Sem imagem">
                @else
                    <img src="{{url("uploads/courses/{$course->image}")}}" alt="{{$course->name}}">
                @endif

                <h2 class="title-course">
                    {{$course->name}}
                </h2>
                <a href="{{route('course', $course->url)}}" class="btn-view">Saiba Mais</a>
            </div>
        </article>
    @empty
        <div class="alert alert-warning">
            <p>Não há cursos cadastrados!</p>
        </div>
    @endforelse


@endsection