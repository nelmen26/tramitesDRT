<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
  {{ Form::label('nombre', 'Nombre') }}
  {{ Form::text('nombre',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'NOMBRE DE LA EMPRESA']) }}
  @if ($errors->has('nombre'))
    <span class="help-block">
      <strong>{{ $errors->first('nombre') }}</strong>
    </span>
  @endif
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group{{ $errors->has('sigla') ? ' has-error' : '' }}">
      {{ Form::label('sigla', 'Sigla') }}
      {{ Form::text('sigla',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'SIGLA DE LA EMPRESA']) }}
      @if ($errors->has('sigla'))
        <span class="help-block">
          <strong>{{ $errors->first('sigla') }}</strong>
        </span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group{{ $errors->has('slogan') ? ' has-error' : '' }}">
      {{ Form::label('slogan', 'Slogan') }}
      {{ Form::text('slogan',null,['class'=> 'form-control', 'placeholder'=>'SLOGAN DE LA EMPRESA']) }}
      @if ($errors->has('slogan'))
        <span class="help-block">
          <strong>{{ $errors->first('slogan') }}</strong>
        </span>
      @endif
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      {{ Form::label('email', 'Correo electronico') }}
      {{ Form::text('email',null,['class'=> 'form-control', 'placeholder'=>'CORREO ELECTRONICO DE LA EMPRESA']) }}
      @if ($errors->has('email'))
        <span class="help-block">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
      {{ Form::label('telefono', 'Telefono') }}
      {{ Form::text('telefono',null,['class'=> 'form-control', 'placeholder'=>'64-00000']) }}
      @if ($errors->has('telefono'))
        <span class="help-block">
          <strong>{{ $errors->first('telefono') }}</strong>
        </span>
      @endif
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
      {{ Form::label('direccion', 'Direccion') }}
      {{ Form::text('direccion',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'DIRECCION DE LA EMPRESA']) }}
      @if ($errors->has('direccion'))
        <span class="help-block">
          <strong>{{ $errors->first('direccion') }}</strong>
        </span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group{{ $errors->has('zona') ? ' has-error' : '' }}">
      {{ Form::label('zona', 'Zona') }}
      {{ Form::text('zona',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'ZONA DE LA EMPRESA']) }}
      @if ($errors->has('zona'))
        <span class="help-block">
          <strong>{{ $errors->first('zona') }}</strong>
        </span>
      @endif
    </div>
  </div>
</div>

<div class="form-group text-center">
	{{ Form::submit('GUARDAR DATOS', ['class'=>'btn btn-flat btn-primary']) }}
</div>