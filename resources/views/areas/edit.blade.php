@extends('layouts.master')

@section('title')
    Areas
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-users"></i>
		AREAS
		<small>Actualizacion de datos del area</small>
	</h1>
@endsection

@section('breadcrumbs')
{{ breadcrumbs('areasedit') }}		
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-user"></i> Actualizar datos del area</h3>
	</div>
	<div class="box-body">
		{!! Form::model($area, ['route' => ['areas.update', $area->id], 'method' => 'PUT']) !!}
			@include('areas.partials.form')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection