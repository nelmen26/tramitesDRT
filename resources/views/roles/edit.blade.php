@extends('layouts.master')

@section('title')
    Roles
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-code-fork"></i>
		ROLES
		<small>Actualizacion de datos del rol</small>
	</h1>
@endsection

@section('breadcrumbs')
{{ breadcrumbs('rolesedit') }}		
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-code-fork"></i> Actualizar datos del Rol</h3>
	</div>
	<div class="box-body">
		{!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']) !!}
			@include('roles.partials.form')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection