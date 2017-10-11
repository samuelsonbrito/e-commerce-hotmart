@extends('school.template.template')

@section('content')
    <section class="pg-form">

        <h1 class="title">Cadastre-se</h1>

        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                <div class="col-md-12">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                           autofocus placeholder="Nome">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                <div class="col-md-12">
                    <input id="email" type="email" class="form-control" name="email"
                           value="{{ old('email') }}" required placeholder="E-mail">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                <div class="col-md-12">
                    <input id="password" type="password" class="form-control" name="password"
                           required placeholder="Senha">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">

                <div class="col-md-12">
                    <input id="password-confirm" type="password" class="form-control"
                           name="password_confirmation" required placeholder="Confirmar senha">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-form">
                        Cadastrar
                    </button>
                    <a class="btn btn-link" href="{{ url('login') }}">
                        Entrar
                    </a>
                </div>
            </div>
        </form>
    </section>
@endsection
