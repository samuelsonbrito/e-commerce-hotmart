@extends('school.template.template')

@section('content')

    <section class="container">

        <div class="aula-info">

        @if(auth()->check() && ($lesson->free || $lesson->course_free))<!--Restrigindo a aula-->

            <div class="col-md-8">
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" width="560" height="315"
                            src="{{$lesson->video}}" frameborder="0" allowfullscreen></iframe>
                </div>

                <ol class="breadcrumb">
                    <li><a href="{{route('course', $lesson->course_url)}}">{{$lesson->course}}</a></li>
                    <li><a href="{{route('course', $lesson->course_url)}}">{{$lesson->module}}</a></li>
                    <li class="active">{{$lesson->name}}</li>
                </ol>

                <h1 class="titulo-aula">
                    {{$lesson->name}}
                </h1>

                <div class="descricao-aula">
                    <p>
                        {{$lesson->description}}
                    </p>
                </div><!--Descrição-->

                @else
                    <div class="col-md-8">
                        <div class="img-aula-bloqueada">
                            <img src="{{url('assets/img/block.jpg')}}" alt="Aula bloqueio" class="aula-bloqueada">

                            @if(!auth()->check())
                                <a href="{{url('login')}}" title="Faça o login">Faça o Login para ter acesso a aula!</a>
                            @else
                                <a href="{{route('course', $lesson->course_url)}}" title="Comprar o curso">Compre esse
                                    curso para ter acesso!</a>
                            @endif
                        </div>

                    @endif<!--Restrigindo a aula-->

                        <div class="compartilha-aula">
                            <ul class="social-aula">
                                <li>
                                    <a href="javascript:void(0)" class="facebook"
                                       onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{Request::URL()}}', 'width=626,heigth=436'); return false">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="twitter"
                                       onclick="window.open('https://www.twitter.com/share?url={{Request::URL()}}', 'width=626,heigth=436'); return false">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="google-plus"
                                       onclick="window.open('https://plus.google.com/share?url={{Request::URL()}}', 'width=626,heigth=436'); return false">
                                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="linkedin"
                                       onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url={{Request::URL()}}', 'width=626,heigth=436'); return false">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div><!--Compartilha-->

                        <section class="autor">
                            <div class="col-md-2 text-center">

                                @if( $lesson->user_image != '')
                                    <img src="{{url("uploads/users/".$lesson->user_image)}}"
                                         alt="{{$lesson->user_name}}" class="img-circle">
                                @else
                                    <img src="{{url('assets/img/profile.png')}}" alt="{{$lesson->user_name}}"
                                         class="img-perfil">
                                @endif

                            </div>
                            <div class="col-md-10">
                                <h2>
                                    {{$lesson->user_name}}
                                </h2>
                                <p>
                                    {{$lesson->bibliography}}
                                </p>
                            </div>
                        </section><!--Autor-->

                        <div class="comment">
                            <div id="disqus_thread"></div>
                            <script>
                                /**
                                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
                                 */
                                /*
                                 var disqus_config = function () {
                                 this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                 this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                 };
                                 */
                                (function () {  // REQUIRED CONFIGURATION VARIABLE: EDIT THE SHORTNAME BELOW
                                    var d = document, s = d.createElement('script');

                                    s.src = 'https://school.disqus.com/embed.js';  // IMPORTANT: Replace EXAMPLE with your forum shortname!

                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <noscript>Please enable JavaScript to view the
                                <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by
                                    Disqus.</a>
                            </noscript>
                        </div><!--End comments-->

                    </div>

                    <!--SideBar-->
                    <div class="col-md-4">
                        <a href="" title="" target="_blank">
                            <img src="{{url('assets/img/banner-curso-laravel-webservices-api.jpg')}}"
                                 alt="Banner Curso de Laravel">
                        </a>
                    </div>
                    <!-- End SideBar-->

            </div><!--Aula-Info-->
        </div>
    </section>

@endsection