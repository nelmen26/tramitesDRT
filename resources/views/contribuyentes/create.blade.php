@extends('layouts.master')

@section('title')
    Contribuyentes
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-user"></i>
		CONTRIBUYENTES
		<small>Nuevo registro</small>
	</h1>
@endsection

@section('breadcrumbs')
{{ breadcrumbs('contribuyentescreate') }}		
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-user-plus"></i> Registrar nuevo contribuyente</h3>
	</div>
	<div class="box-body">
		{!! Form::open(['route' => 'contribuyentes.store']) !!}
			@include('contribuyentes.partials.form')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection