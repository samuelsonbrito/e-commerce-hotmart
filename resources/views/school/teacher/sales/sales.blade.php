@extends('school.template.template')

@section('content')

    <section class="vendas">
        <div class="container">
            <h1 class="titulo-venda">{{$title}}</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Transação</th>
                    <th>Aluno</th>
                    <th>Curso</th>
                    <th>Data</th>
                </tr>
                </thead>
                <tbody>

                @forelse($sales as $sale)
                    <tr>
                        <td>{{$sale->transaction}}</td>
                        <td><a href="?pg=detalhes-aluno" title="">{{$sale->user_name}}</a></td>
                        <td><a href="" title="">{{$sale->course_name}}</a></td>
                        <td>{{$sale->date}}</td>
                    </tr>
                @empty
                    <div class="alert alert-warning">
                        <p>Não há vendas para esse instrutor!</p>
                    </div>
                @endforelse

                </tbody>
            </table>
        </div>
    </section>

@endsection