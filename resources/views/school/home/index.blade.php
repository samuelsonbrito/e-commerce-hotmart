@extends('school.template.template')

@section('content')

    <div class="form-search">
        {{Form::open(['route'=>'course.search', 'class' => 'form form-inline'])}}
        {!! Form::select('category', $categories, null, ['class'=>'form-control', 'placeholder'=>'Selecione']) !!}
        <input type="submit" value="Filtrar por Categoria" class="btn btn-search">
        {{Form::close()}}
    </div>

    <h1 class="title">{{$title}}</h1>

    <div class="courses">

        @foreach($courses as $course)
            <article class="col-md-3 col-sm-6 col-xm-12">
                <div class="course">

                    @if($course->image == null)
                        <img src="{{url("assets/img/sem-imagem.jpg")}}" alt="Sem imagem" class="img-course-detail">
                    @else
                        <img src="{{url("uploads/courses/{$course->image}")}}" alt="{{$course->name}}" class="img-course-detail">
                    @endif

                    <h2 class="title-course">
                        {{$course->name}}
                    </h2>
                    <a href="{{route('course', $course->url)}}" class="btn-view">Saiba Mais</a>
                </div>
            </article>
        @endforeach

    </div><!--Courses-->

    <div class="pag">
        @if(isset($dataForm))
            {!! $courses->appends($dataForm)->links() !!}
        @else
            {!! $courses->links() !!}
        @endif
    </div><!--Paginação-->

@endsection
