@extends('school.template.template')

@section('content')

    <h1 class="title">{{$title}}</h1>

    <div class="form-search">
        {{Form::open(['route'=>'teacher.courses.search', 'class' => 'form form-inline'])}}
        {{Form::text('key-search', null, ['placeholder'=>'Digite um nome:', 'class'=>'form-control'])}}

        <input type="submit" value="Pesquisar" class="btn btn-search">
        {{Form::close()}}

        @if( isset($dataForm['key-search']))
            <p><b>Resultados para: </b>{{$dataForm['key-search']}}</p>
        @endif
    </div>

    <div class="container" style="float: left; width: 100%;">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
    </div>

    <div class="courses">
        @foreach($cursos as $curso)
            <article class="col-md-3 col-sm-6 col-xm-12">
                <div class="course">
                    @if($curso->image == null)
                        <img src="{{url("assets/img/sem-imagem.jpg")}}" alt="Sem imagem">
                    @else
                        <img src="{{url("uploads/courses/{$curso->image}")}}" alt="{{$curso->name}}">
                    @endif

                    <h2 class="title-course">{{$curso->name}}</h2>

                    {!! Form::open(['route' => ['course.destroy', $curso->id], 'class'=>'form form-school', 'method'=>'DELETE']) !!}
                    <button title="Deletar Curso" type="submit" class="btn btn-danger btn-delete-curso"
                            onclick="return confirm('Você deseja realmente excluir este curso?');">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                    {!! Form::close() !!}
                    <a href="{{route('course.modules', $curso->id)}}" class="btn btn-primary btn-module-teacher"
                       title="Módulos">
                        <span class="glyphicon glyphicon-level-up"></span>
                    </a>
                    <a href="{{route('teacher.course.edit', $curso->id)}}" class="btn btn-warning btn-edit-course"
                       title="Editar curso">
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