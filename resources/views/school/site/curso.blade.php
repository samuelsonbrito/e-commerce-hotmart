@extends('school.template.template')

@section('content')

    <section class="detalhes-curso">

        <div class="container">

            <div class="col-md-7">
                <h1 class="titulo-curso">{{$course->name}}</h1>
                <h2 class="descricao-curso">{{$course->description}}</h2>

                <p class="info-curso"><strong>Categoria: </strong>{{$course->category_id}}</p>
                <p class="info-curso"><strong>Total de alunos: </strong>...</p>
                <p class="info-curso"><strong>Professor: </strong>{{$course->user_id}}</p>
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
                <?php for ($i = 1; $i <= 10; $i++) {?>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?=$i?>"
                               aria-expanded="false" aria-controls="collapse-<?=$i?>">
                                Módulo <?=$i?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse-<?=$i?>" class="panel-collapse collapse in" role="tabpanel"
                         aria-labelledby="headingOne">
                        <div class="panel-body">

                            <?php for ($j = 1; $j < 10; $j++) {?>
                            <a href="?pg=aula" title="" class="aulas">
                                <i class="fa fa-video-camera" aria-hidden="true"></i>
                                Aula <?=$j?>

                                <?php if ($j == 1 || $j == 3 || $j == 6) {?>
                                <span class="badge badge-free">
										Free
									</span>
                                <?php }?>


                            </a>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <?php }?>

            </div>
        </div>
    </section><!--Detalhes Curso Ementa-->

@endsection
