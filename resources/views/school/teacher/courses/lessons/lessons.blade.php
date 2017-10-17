@extends('school.template.template')

@section('content')

    <h1 class="title">{{$title}}</h1>

    <a href="{{route('aulas.create',['id'=>$module->id])}}" class="btn btn-create" title="Cadastrar Módulo"><span
                class="glyphicon glyphicon-plus"></span> Cadastrar</a>

    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th>Url</th>
            <th>Descrição</th>
            <th>Free</th>
            <th width="120px">Ação</th>
        </tr>
        @forelse( $lessons as $lesson )
            <tr>
                <td>{{$lesson->name}}</td>
                <td>{{$lesson->url}}</td>
                <td>{{$lesson->description}}</td>
                <td>{{$lesson->free}}</td>
                <td>
                    <a href="{{route('aulas.edit', $lesson->id)}}" class="btn btn-warning btn-edit"
                       title="Editar Módulo">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    {!! Form::open(['route'=>['aulas.destroy', $lesson->id], 'class'=>'form form-school', 'method'=>'DELETE']) !!}
                    {!! Form::hidden('course_id', $lesson->course_id) !!}
                    <button title="Deletar Módulo" type="submit" class="btn btn-danger btn-delete"
                            onclick="return confirm('Você deseja realmente excluir este aula?');">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @empty
            <div class="alert alert-warning" role="alert">
                Não há aulas cadastradas para esse módulo!
            </div>
        @endforelse
    </table>

    <div class="pag">
        {!! $lessons->links() !!}
    </div>

@endsection