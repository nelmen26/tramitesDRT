<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('carnet') ? ' has-error' : '' }}">
			{{ Form::label('carnet', 'Carnet') }}
			{{ Form::text('carnet', null,['class'=> 'form-control', 'placeholder'=>'-- DOCUMENTO DE IDENTIDAD --']) }}
			@if ($errors->has('carnet'))
				<span class="help-block">
					<strong>{{ $errors->first('carnet') }}</strong>
				</span>
			@endif
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
			{{ Form::label('nombres', 'Nombre') }}
			{{ Form::text('nombres',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'NOMBRE COMPLETO']) }}
			@if ($errors->has('nombres'))
				<span class="help-block">
					<strong>{{ $errors->first('nombres') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>

<div class="form-group text-center">
	{{ Form::submit('GUARDAR', ['class'=>'btn btn-flat btn-primary']) }}
	<a href="{{ route('contribuyentes.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>
</div>