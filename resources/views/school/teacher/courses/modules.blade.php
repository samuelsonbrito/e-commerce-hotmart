@extends('school.template.template')

@section('content')

    <h1 class="title">{{$title}}</h1>

    <a href="{{route('modulos.create',['id'=>$course->id])}}" class="btn btn-create" title="Cadastrar Módulo"><span
                class="glyphicon glyphicon-plus"></span> Cadastrar</a>

    <table class="table table-striped">
        <tr>
            <th>Nome:</th>
            <th>Descrição</th>
            <th width="100px">Ação</th>
        </tr>

        @foreach($modules as $module)
            <tr>
                <td>{{$module->name}}</td>
                <td>{{$module->description}}</td>
                <td>
                    #Ações
                </td>
            </tr>
        @endforeach
    </table>

    <div class="pag">
        {!! $modules->links() !!}
    </div>

@endsection