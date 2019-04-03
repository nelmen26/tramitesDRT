@extends('layouts.master')

@section('title')
    NO AUTORIZADO
@endsection

@section('head-content')
	<h1>
		403 NO AUTORIZADO
	</h1>
@endsection

@section('main-content')

<div class="error-page">
  <h2 class="headline text-red">403</h2>

  <div class="error-content">
    <h3><i class="fa fa-warning text-red"></i> Direccion URL no autorizado</h3>

    <p>
      Le informamos que no tiene autorizado entrar este enlace URL
      <br> Por favor salga de este enlace
    </p>

  </div>
</div>

@endsection
