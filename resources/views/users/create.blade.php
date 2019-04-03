@extends('layouts.master')

@section('title')
    Usuarios
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-user"></i>
		USUARIOS
		<small>Nuevo registro</small>
	</h1>
@endsection

@section('breadcrumbs')
{{ breadcrumbs('userscreate') }}		
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-user-plus"></i> Registrar nuevo usuario</h3>
	</div>
	<div class="box-body">
		{!! Form::open(['route' => 'users.store']) !!}
			@include('users.partials.form')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection