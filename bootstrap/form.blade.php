{{ csrf_field() }}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <div class="col-md-12">
        {{Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nome:', 'required', 'autofocus'])}}

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <div class="col-md-12">
        {{Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email:','required'])}}

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <div class="col-md-12">

        {{Form::password('password', ['class'=>'form-control', 'placeholder'=>'Senha:','required'])}}

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-12">
        {{Form::password('password', ['class'=>'form-control', 'placeholder'=>'Confirmar Senha:','required'])}}
    </div>
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <div class="col-md-12">

        {{Form::file('image', ['class'=>'form-control'])}}

        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('token') ? ' has-error' : '' }}">
    <div class="col-md-12">

        {{Form::text('token', null, ['class'=>'form-control', 'placeholder'=>'Token:'])}}

        @if ($errors->has('token'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bibliography') ? ' has-error' : '' }}">
    <div class="col-md-12">

        {{Form::textarea('bibliography', null, ['class'=>'form-control', 'placeholder'=>'Bibliografia:'])}}
        @if ($errors->has('bibliography'))
            <span class="help-block">
                <strong>{{ $errors->first('bibliography') }}</strong>
            </span>
        @endif
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