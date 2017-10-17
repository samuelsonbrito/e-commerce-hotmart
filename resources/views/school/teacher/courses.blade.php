@extends('school.template.template')

@section('content')

    <div class="form-search">

        {{Form::open(['route'=>'teacher.courses.search', 'class' => 'form form-inline'])}}
        {{Form::text('key-search', null, ['placeholder'=>'Digite um nome:', 'class'=>'form-control'])}}

        <input type="submit" value="Pesquisar" class="btn btn-search">
        {{Form::close()}}

        @if( isset($dataForm['key-search']))
            <p><b>Resultados para: </b>{{$dataForm['key-search']}}</p>
        @endif
    </div>

    <h1 class="title">{{$title}}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <div class="courses">
        @foreach($cursos as $curso)
            <article class="col-md-3 col-sm-6 col-xm-12">
                <div class="course">
                    @if($curso->image == null)
                        <img src="{{url("assets/img/sem-imagem.jpg")}}" alt="Sem imagem">
                    @else
                        <img src="{{url("uploads/courses/{$curso->image}")}}" alt="{{$curso->name}}">
                    @endif
                    <h2 class="title-course">
                        {{$curso->name}}
                    </h2>
                    <a href="" class="btn-view-teacher" title="Visualizar curso">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </a>
                    <a href="{{route('course.modules', $curso->id)}}" class="btn-module-teacher"
                       title="Módulos">
                        <span class="glyphicon glyphicon-level-up"></span>
                    </a>
                    <a href="{{route('teacher.course.edit', $curso->id)}}" class="btn-view-edit" title="Editar curso">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                </div>
            </article>
        @endforeach

    </div><!--Courses-->

    <div class="pag">
        @if(isset($dataForm))
            {!! $cursos->appends($dataForm)->links() !!}
        @else
            {!! $cursos->links() !!}
        @endif
    </div><!--Paginação-->


@endsection