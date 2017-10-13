@extends('school.template.template')

@section('content')

    <div class="form-search">
        <form class="form form-inline">
            <input type="text" name="search" placeholder="Digite a sua pesquisa..." class="form-control">

            <select name="category" class="form-control">
                <option value="">Todas</option>
                <option value="1">Web</option>
                <option value="2">Mobile</option>
            </select>

            <input type="submit" value="Pesquisar" class="btn btn-search">
        </form>
    </div>

    <h1 class="title">{{$title}}</h1>

    <div class="courses">
        @foreach($cursos as $curso)
            <article class="col-md-3 col-sm-6 col-xm-12">
                <div class="course">
                    <img src="{{url("uploads/courses/{$curso->image}")}}" alt="{{$curso->name}}">
                    <h2 class="title-course">
                        {{$curso->name}}
                    </h2>
                    <a href="" class="btn-view">Saiba Mais</a>
                </div>
            </article>
        @endforeach

    </div><!--Courses-->

    <div class="pag">
        {!! $cursos->links() !!}
    </div><!--Paginação-->


@endsection