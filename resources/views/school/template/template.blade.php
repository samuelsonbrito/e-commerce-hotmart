<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{$title or 'LaraSchool'}}</title>

    <!-- Fonts Google-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- Bootstrap-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!--Font awesome-->
    <link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}">

    <!-- Meu css-->
    <link rel="stylesheet" href="{{url('assets/css/estilo.css')}}">

    <!-- Reset css-->
    <link rel="stylesheet" href="{{url('assets/css/reset.css')}}">

    <!--Favicon-->
    <link rel="icon" type="image/png" href="{{url('assets/img/favicon.png')}}">
</head>

<body>

<nav class="nav-header">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="pg=index">
                <img src="{{url('assets/img/logo-laraschool.png')}}" alt="Lara School" class="logo">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="navbar-nav menu-itens">
                <li><a href="#">Meus Cursos</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Instrutor<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?pg=home">Cursos</a></li>
                        <li><a href="?pg=aluno">Alunos</a></li>
                        <li><a href="?pg=venda">Vendas</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="?pg=form">Cadastrar Curso</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <img src="{{url('assets/img/profile.png')}}" alt="Perfil" class="img-perfil">
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Meu Perfil</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<section class="content">
    <div class="container">
        @yield('content')
    </div>
</section><!--Section Content-->

<footer class="footer">
    <div class="container">
        <div class="col-md-6">
            <img src="{{url('assets/img/logo-laraschool-two.png')}}" alt="Logo da EspecializaTi" class="logo-footer">
        </div>
        <div class="col-md-6 text-center">
            <ul class="social">
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
                <li>
                    <a href="" class="youtube">
                        <i class="fa fa-youtube" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>

<div class="copy text-center">
    <p>Todos os direitos reservados
        <a href="https://valdir-ti.github.io" target="_blank">
            <img src="{{url('assets/img/minha_logo.png')}}" style="height: 20px;">
        </a> {!! date('Y') !!}
    </p>
</div>

<!--JS-->
<!--JQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Bootstrap -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>