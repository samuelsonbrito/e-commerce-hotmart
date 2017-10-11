@extends('school.template.template')

@section('content')
    <section class="pg-form">

        <h1>Entrar</h1>

        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control" name="email"
                           placeholder="E-mail" value="{{ old('email')  }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                <div class="col-md-12">
                    <input id="password" type="password" class="form-control" name="password" required
                           placeholder="Sua senha">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-form">
                        Entrar
                    </button>

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Esqueceu a sua senha?
                    </a>
                    <a class="btn btn-link" href="{{ url('register') }}">
                        Cadastrar
                    </a>
                </div>
            </div>

        </form>
    </section>
@endsection
