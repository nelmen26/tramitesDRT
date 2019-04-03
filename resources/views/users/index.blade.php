@extends('layouts.master')

@section('title')
    Usuarios
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-users"></i>
		USUARIOS
		<small>Gestionar usuarios en el sistema</small>
	</h1>
@endsection
@section('breadcrumbs')
{{ breadcrumbs('users') }}
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-list"></i> LISTA DE USUARIOS</h3>

	 	<div class="box-tools">
			@can('users.create')
			<a href="{{ route('users.create') }}" class="btn btn-flat btn-sm btn-primary">
				<i class="fa fa-plus-circle"></i> NUEVO USUARIO
			</a>
			@endcan
	  	</div>
	</div>
	<div class="box-body">
		<table id="usuarios" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th width="10px">#</th>
					<th>NOMBRE</th>
					<th>USUARIO</th>
					<th>ROLES</th>
					<th width="10%">ESTADO</th>
					<th width="8%">&nbsp;</th>
				</tr>
			</thead> 
		</table>
    </div>
	<!-- /.box-body -->
</div>

@endsection

@section('scripts')
<script>
    let tabla = $('#usuarios').DataTable({
		responsive: true,
		autoWidth:false,
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar usuario..."
        },
        order: [[ 0, "asc" ]],
        processing: true,
        serverSide: true,
        ajax: '{!! route('users.apiUsers') !!}',
        columns: [
            { data: 'numero_index'},
            { data: 'nombre'},
            { data: 'nickname'},
            { data: 'rol'},
			{ data: 'estado'},
            { data: 'action', orderable: false, searchable: false},
        ],
	});
	const eliminarUser = id => {
		let ruta = `${direccion}/administracion/users/${id}/delete`
		eliminar(ruta,'usuario',tabla)
	};
</script>
@endsection