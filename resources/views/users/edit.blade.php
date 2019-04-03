@extends('layouts.master')

@section('title')
    Usuarios
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-users"></i>
		USUARIOS
		<small>Actualizacion de datos del usuario</small>
	</h1>
@endsection

@section('breadcrumbs')
{{ breadcrumbs('usersedit') }}		
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-user"></i> Actualizar datos del usuario</h3>
	</div>
	<div class="box-body">
		{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
			@include('users.partials.form')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection