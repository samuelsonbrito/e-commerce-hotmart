@extends('school.template.template')

@section('content')

    <h1 class="title">{{$title}}</h1>

    <a href="{{route('modulos.create',['id'=>$course->id])}}" class="btn btn-create" title="Cadastrar Módulo"><span
                class="glyphicon glyphicon-plus"></span> Cadastrar</a>

    @forelse( $modules as $module )
        <table class="table table-striped">
            <tr>
                <th>Nome:</th>
                <th>Descrição</th>
                <th width="100px">Ação</th>
            </tr>
            <tr>
                <td>{{$module->name}}</td>
                <td>{{$module->description}}</td>
                <td>
                    <a href="{{route('modulos.edit', $module->id)}}" class="btn btn-warning btn-edit">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                </td>
            </tr>
        </table>
    @empty
        <div class="alert alert-warning" role="alert">
            <p>Não existem módulos cadastrados para esse curso!</p>
        </div>
    @endforelse






    <div class="pag">
        {!! $modules->links() !!}
    </div>

@endsection