@extends('layouts.master')

@section('title')
    Empresa
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-bank"></i>
		EMPRESA
		<small>Perfil de la Empresa</small>
	</h1>
@endsection

@section('breadcrumbs')
{{ breadcrumbs('empresas') }}		
@endsection

@section('main-content')
<div class="row">
  <div class="col-md-3">
    <div class="box box-primary">
      <div class="box-body">
        <img src="{{ asset('img/empresa/'.$empresa->logo) }}" alt="Logo de la Empresa" class="img-responsive img-thumbnail">
        <h4 class="text-center">{{ $empresa->nombre }}</h4>
        <p class="text-muted text-center">{{ $empresa->email }}</p>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="button" id='upload' class="btn btn-flat bg-black btn-sm btn-block"><i class="fa fa-picture-o"></i> SUBIR FOTO</button>
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-info-circle"></i> Detalle de la empresa</h3>
      </div>
      <div class="box-body">
        {!! Form::model($empresa, ['route' => 'empresas.store']) !!}
          @include('empresas.partials.form')
        {!! Form::close() !!}
        </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>

@include('empresas.partials.modal')

@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/dropzone/basic.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
<script>
  const botonUpload = document.getElementById('upload');
  botonUpload.addEventListener('click',e=>{
    $('#modal-logo').modal('show');
  });
  Dropzone.options.miDropzone = {
    paramName: "file",
    dictDefaultMessage: 'Arrastre el logo aqui para subir al sistema',
    dictRemoveFile: 'Eliminar archivo',
    addRemoveLinks: true,
    autoProcessQueue:false,
    maxFiles:1,
    acceptedFiles:'.png,.jpg,.gif,.bmp,.jpeg',
    init:function(){
      var submitButton = document.querySelector('#button-upload');
      myDropzone = this;
      submitButton.addEventListener('click', function(){
        myDropzone.processQueue();
      });
      this.on('complete', function(){
        if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
        {
          console.log("Subido");
          var _this = this;
           _this.removeAllFiles();
          $('#modal-logo').modal('hide');
          location.reload();
        }
      });
    },
  };
</script>
@endsection