@extends('layouts.master')

@section('title')
    Contribuyentes
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-users"></i>
		CONTRIBUYENTES
		<small>Actualizacion de datos del contribuyente</small>
	</h1>
@endsection

@section('breadcrumbs')
{{ breadcrumbs('contribuyentesedit') }}		
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-user"></i> Actualizar datos del contribuyente</h3>
	</div>
	<div class="box-body">
		{!! Form::model($contribuyente, ['route' => ['contribuyentes.update', $contribuyente->id], 'method' => 'PUT']) !!}
			@include('contribuyentes.partials.form')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection