<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
			{{ Form::label('nombre', 'Nombre') }}
			{{ Form::text('nombre',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'NOMBRE COMPLETO']) }}
			@if ($errors->has('nombre'))
				<span class="help-block">
					<strong>{{ $errors->first('nombre') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
			{{ Form::label('nickname', 'Usuario') }}
			{{ Form::text('nickname', null,['class'=> 'form-control', 'placeholder'=>'NOMBRE DE USUARIO']) }}
			@if ($errors->has('nickname'))
				<span class="help-block">
					<strong>{{ $errors->first('nickname') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			{{ Form::label('password', 'Contraseña') }}
			{{ Form::password('password',['class'=> 'form-control', 'placeholder'=>'**********']) }}
			@if ($errors->has('password'))
				<span class="help-block">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
			@endif
		</div>
	</div>
  <div class="col-md-6">
		<div class="form-group">
			{{ Form::label('roles','Rol') }}
			{{ Form::select('roles[]',$roles,isset($user) ? $user->getRoles() : null,['class'=>'form-control select', 'multiple' => 'multiple']) }}
		</div>
  </div>
</div>

<div class="form-group text-center">
	<div class="row">
		<div class="col-md-3 col-md-offset-3">
			<label>
				{{ Form::radio('estado','A') }} HABILITAR
			</label>
		</div>
		<div class="col-md-3">
			<label>
				{{ Form::radio('estado','D') }} DESHABILITAR	
			</label>
		</div>
	</div>
	
	
</div>

<div class="form-group text-center">
	{{ Form::submit('GUARDAR', ['class'=>'btn btn-flat btn-primary']) }}
	<a href="{{ route('users.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>
</div>

@section('css')
	<!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
	<!-- iCheck -->
	<link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <!-- iCheck -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $(function(){
            $(".select").select2();
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        })
    </script>
@endsection