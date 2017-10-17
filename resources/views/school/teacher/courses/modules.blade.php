@extends('school.template.template')

@section('content')

    <ol class="breadcrumb bread">
        <li><a href="{{route('teacher.courses')}}">Cursos</a></li>
        <li class="active">Módulos</li>
    </ol>

    <h1 class="title">{{$title}}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-warning">
            {{session('error')}}
        </div>
    @endif

    <a href="{{route('modulos.create',['id'=>$course->id])}}" class="btn btn-create" title="Cadastrar Módulo"><span
                class="glyphicon glyphicon-plus"></span> Cadastrar</a>

    <table class="table table-striped">
        <tr>
            <th>Nome:</th>
            <th>Descrição</th>
            <th width="120px">Ação</th>
        </tr>
        @forelse( $modules as $module )
            <tr>
                <td>{{$module->name}}</td>
                <td>{{$module->description}}</td>
                <td>
                    <a href="{{route('modulos.edit', $module->id)}}" class="btn btn-warning btn-edit"
                       title="Editar Módulo">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="{{route('module.lessons', $module->id)}}" class="btn btn-primary btn-lesson" title="Aulas">
                        <span class="glyphicon glyphicon-facetime-video"></span>
                    </a>
                    {!! Form::open(['route'=>['modulos.destroy', $module->id], 'class'=>'form form-school', 'method'=>'DELETE']) !!}
                    {!! Form::hidden('course_id', $module->course_id) !!}
                    <button title="Deletar Módulo" type="submit" class="btn btn-danger btn-delete"
                            onclick="return confirm('Você deseja realmente excluir este módulo?');">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @empty
            <div class="alert alert-warning" role="alert">
                Não há módulos cadastrado para esse curso!
            </div>
        @endforelse
    </table>

    <div class="pag">
        {!! $modules->links() !!}
    </div>

@endsection