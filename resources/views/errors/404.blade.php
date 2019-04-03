@extends('layouts.master')

@section('title')
    PAGINA NO ENCONTRADA
@endsection

@section('head-content')
	<h1>
		404 PAGINA NO ENCONTRADA
	</h1>
@endsection

@section('main-content')

<div class="error-page">
  <h2 class="headline text-yellow"> 404</h2>

  <div class="error-content">
    <h3><i class="fa fa-warning text-yellow"></i> Oops! Pagina no encontrada</h3>

    <p>
      Le informamos que el enlace al que desea ingresar no existe o no fue encontrada
      <br> Porfavor intente con otra direccion.
    </p>

  </div>
  <!-- /.error-content -->
</div>

@endsection
