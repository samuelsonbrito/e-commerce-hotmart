<div class="form-group">
    {!! Form::select('category_id',$categories, null, ['class'=>'form-control', 'placeholder'=>'Selecione Categoria']) !!}
</div>
<div class="form-group">
    {!! Form::text('name',null, ['class'=>'form-control', 'placeholder' => 'Nome:']) !!}
</div>
<div class="form-group">
    {!! Form::text('url',null, ['class'=>'form-control', 'placeholder' => 'URL do curso:']) !!}
</div>
<div class="form-group">
    {!! Form::text('description',null, ['class'=>'form-control', 'placeholder' => 'Descrição:']) !!}
</div>
<div class="form-group">
    {!! Form::file('image',['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::text('code',null, ['class'=>'form-control', 'placeholder' => 'Código curso Hotmart:']) !!}
</div>
<div class="form-group">
    {!! Form::text('total_hours',null, ['class'=>'form-control', 'placeholder' => 'Total de horas:']) !!}
</div>
<div class="form-group">
    <label>
        Publicar?
        {!! Form::checkbox('published', '1') !!}
    </label>
</div>
<div class="form-group">
    <label>
        Grátis?
        {!! Form::checkbox('free') !!}
    </label>
</div>
<div class="form-group">
    {!! Form::text('price',null, ['class'=>'form-control', 'placeholder' => 'Valor total:']) !!}
</div>
<div class="form-group">
    {!! Form::text('price_plots',null, ['class'=>'form-control', 'placeholder' => 'Valor das Parcelas:']) !!}
</div>
<div class="form-group">
    {!! Form::text('total_plots',null, ['class'=>'form-control', 'placeholder' => 'Total de Parcelas:']) !!}
</div>
<div class="form-group">
    {!! Form::text('link_buy',null, ['class'=>'form-control', 'placeholder' => 'Link comprar Hotmart:']) !!}
</div>

<div class="form-group">
    <input type="submit" value="Enviar" class="btn btn-form">
</div>