@extends('school.template.template')

@section('content')

    <section class="detalhes-curso">

        <div class="container">

            <div class="col-md-7">
                <h1 class="titulo-curso">{{$course->name}}</h1>
                <h2 class="descricao-curso">{{$course->description}}</h2>

                <p class="info-curso"><strong>Categoria: </strong>{{$course->category_id}}</p>
                <p class="info-curso"><strong>Total de alunos: </strong>...</p>
                <p class="info-curso"><strong>Professor: </strong><a href="{{route('user', $course->user->id)}}">{{$course->user->name}}</a></p>
                <p class="info-curso"><strong>Gratuito: </strong>
                    @if($course->free) SIM @else NÃO @endif
                </p>
                <p class="info-curso"><strong>Horas: </strong>{{$course->total_hours}}</p>
                <p class="info-curso"><strong>Tempo de acesso: </strong>Vitalício</p>
                <p class="info-curso"><strong>Preço: </strong>{{$course->price}}</p>
                <p class="info-curso"><strong>Parcelas: </strong>{{$course->total_plots}}</p>
                <p class="info-curso"><strong>Valor da parcelas: </strong>{{$course->price_plots}}</p>
            </div>

            <div class="col-md-5 text-center">

                @if($course->image == null)
                    <img src="{{url("assets/img/sem-imagem.jpg")}}" alt="Sem imagem" class="img-curso-detalhe">
                @else
                    <img src="{{url("uploads/courses/{$course->image}")}}" alt="{{$course->name}}"
                         class="img-curso-detalhe">
                @endif

                <a href="{{$course->link_buy}}" title="" class="btn-buy">Comprar Agora!</a>
            </div>
        </div>

    </section><!--Detalhes Curso-->

    <section class="detalhes-curso-itens">
        <div class="container">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                @forelse($modules as $key => $module)

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapse-{{$key}}"
                                   aria-expanded="false" aria-controls="collapse-{{$key}}">
                                    {{$module->name}}
                                </a>
                            </h4>
                        </div>
                        <div id="collapse-{{$key}}" class="panel-collapse collapse in" role="tabpanel"
                             aria-labelledby="headingOne">
                            <div class="panel-body">

                                @forelse($module->lessons as $lesson)
                                    <a href="{{route('lesson',  $lesson->url)}}" title="" class="aulas">
                                        <i class="fa fa-video-camera" aria-hidden="true"></i>
                                        {{$lesson->name}}

                                        @if($lesson->free)
                                            <span class="badge badge-free">Free</span>
                                        @endif
                                    </a>
                                @empty
                                    <div class="alert alert-warning">
                                        <p>Não há aulas cadastradas nesse módulo!</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-warning">
                        <p>Não há módulos cadastrados nesse curso!</p>
                    </div>
                @endforelse

            </div>
        </div>
    </section><!--Detalhes Curso Ementa-->

@endsection
