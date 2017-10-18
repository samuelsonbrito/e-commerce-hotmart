@extends('school.template.template')

@section('content')


    <div class="form-search">
        {{Form::open(['route'=>'teacher.courses.search', 'class' => 'form form-inline'])}}
        {!! Form::select('category', $categories, null, ['class'=>'form-control']) !!}

        {{Form::text('key-search', null, ['placeholder'=>'Digite:', 'class'=>'form-control'])}}

        <input type="submit" value="Pesquisar" class="btn btn-search">
        {{Form::close()}}
    </div>

    <h1 class="title">{{$title}}</h1>

    <div class="courses">

        @foreach($courses as $course)
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
                    <a href="?pg=curso" class="btn-view">Saiba Mais</a>
                </div>
            </article>
        @endforeach

    </div><!--Courses-->

    <div class="pag">
        {!! $courses->links() !!}
    </div><!--Paginação-->

@endsection
