@extends('school.template.template')

@section('content')

    <section class="container">


        <h1 class="title">{{$title}}</h1>

        <div class="alunos text-center">

            @forelse($students as $student)
                <article class="col-md-2 col-sm-4 col-xm-6 aluno">
                    <a href="?pg=detalhes-aluno" title="">

                        @if($student->user_image != '')
                            <img src="{{url("uploads/users/{$student->user_image}")}}" alt="{{$student->user_name}}"
                                 class="aluno-img img-circle">
                        @else
                            <img src="{{url("assets/img/profile.png")}}" alt="{{$student->user_name}}"
                                 class="aluno-img img-circle">
                        @endif

                        <h2>{{$student->user_name}}</h2>
                    </a>
                </article>
            @empty
                <div class="alert alert-warning">
                    <p>Não há alunos cadastrados!</p>
                </div>
            @endforelse

        </div>

        <div class="pag">
        </div><!--Paginação-->
    </section>

@endsection