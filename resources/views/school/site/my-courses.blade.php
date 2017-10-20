@extends('school.template.template')

@section('content')

    <h1 class="title">{{$title}}</h1>

    <div class="courses">

        @forelse($sales as $course)
            <article class="col-md-3 col-sm-6 col-xm-12">
                <div class="course">

                    @if($course->image == null)
                        <img src="{{url("assets/img/sem-imagem.jpg")}}" alt="{{$course->name}}">
                    @else
                        <img src="{{url("uploads/courses/{$course->image}")}}" alt="{{$course->name}}">
                    @endif

                    <h2 class="title-course">
                        {{$course->name}}
                    </h2>
                    <a href="{{route('course', $course->url)}}" class="btn-view">Saiba Mais</a>
                </div>
            </article>
        @empty
            <div class="alert alert-warning">
                <p>Nenhuma compra ainda efetuada :/</p>
            </div>
        @endforelse

    </div><!--Courses-->

    <div class="pag">
        {!! $sales->links() !!}
    </div><!--Paginação-->

@endsection
