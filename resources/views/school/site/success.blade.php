@extends('school.template.template')

@section('content')

    <section class="container text-center">

        <div class="pg-form">

            <h1 class="title">
                Pedido realizado com sucesso!
            </h1>
            <p>
                O HotMart está processando o seu pagamento, assim que estiver
                concluído iremos enviar um e-mail com as instruções para acessar o curso.
            </p>

            <img src="{{url('assets/img/success.png')}}" alt="Página de Sucesso" class="img-success">

        </div>

    </section>

@endsection