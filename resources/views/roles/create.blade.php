@extends('layouts.master')

@section('title')
    Roles
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-code-fork"></i>
		ROLES
		<small>Nuevo registro</small>
	</h1>
@endsection

@section('breadcrumbs')
{{ breadcrumbs('rolescreate') }}		
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-code-fork"></i> Registrar Nuevo Rol</h3>
	</div>
	<div class="box-body">
		{!! Form::open(['route' => 'roles.store']) !!}
			@include('roles.partials.form')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection