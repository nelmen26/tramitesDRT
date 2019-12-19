@extends('layouts.master')

@section('title')
    Areas
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-user"></i>
		AREAS
		<small>Nuevo registro</small>
	</h1>
@endsection

@section('breadcrumbs')
{{ breadcrumbs('areascreate') }}		
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-user-plus"></i> Registrar nueva area</h3>
	</div>
	<div class="box-body">
		{!! Form::open(['route' => 'areas.store']) !!}
			@include('areas.partials.form')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection