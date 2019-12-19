<div class="row">
	
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
			{{ Form::label('nombre', 'Nombre del Area') }}
			{{ Form::text('nombre',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'-- NOMBRE DEL AREA --']) }}
			@if ($errors->has('nombre'))
				<span class="help-block">
					<strong>{{ $errors->first('nombre') }}</strong>
				</span>
			@endif
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
			{{ Form::label('descripcion', 'Descripcion') }}
			{{ Form::text('descripcion', null,['class'=> 'form-control', 'placeholder'=>'-- DOCUMENTO DE IDENTIDAD --']) }}
			@if ($errors->has('descripcion'))
				<span class="help-block">
					<strong>{{ $errors->first('descripcion') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>

<div class="form-group text-center">
	<div class="row">
		<div class="col-md-3 col-md-offset-3">
			<label>
				{{ Form::radio('activo',1) }} HABILITAR
			</label>
		</div>
		<div class="col-md-3">
			<label>
				{{ Form::radio('activo',0) }} DESHABILITAR	
			</label>
		</div>
	</div>	
</div>

<div class="form-group text-center">
	{{ Form::submit('GUARDAR', ['class'=>'btn btn-flat btn-primary']) }}
	<a href="{{ route('areas.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>
</div>

@section('css')
	<!-- iCheck -->
	<link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <!-- iCheck -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
    <script>
        $(function(){
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        })
    </script>
@endsection