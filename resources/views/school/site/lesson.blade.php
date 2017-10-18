@extends('school.template.template')

@section('content')

    <section class="container">

        <div class="aula-info">


            <div class="col-md-8">
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" width="560" height="315"
                            src="{{$lesson->video}}" frameborder="0" allowfullscreen></iframe>
                </div>

                <ol class="breadcrumb">
                    <li><a href="#">PHP Samurai</a></li>
                    <li><a href="#">Módulo Básico</a></li>
                    <li class="active">Nome da aula</li>
                </ol>

                <h1 class="titulo-aula">
                    {{$lesson->name}}
                </h1>

                <div class="descricao-aula">
                    <p>
                        {{$lesson->description}}
                    </p>
                </div><!--Descrição-->

                <div class="compartilha-aula">
                    <ul class="social-aula">
                        <li>
                            <a href="" class="facebook">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="twitter">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="google-plus">
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="linkedin">
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
                        <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a>
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
    </section>

@endsection