@extends('school.template.template')

@section('content')
    <section class="pg-form">

        <h1 class="title">Resetar a senha</h1>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

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

                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-form">
                            Recuperação de senha
                        </button>
                    </div>
                </div>
            </form>
    </section>
@endsection
