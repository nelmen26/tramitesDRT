@extends('layouts.master')

@section('title')
    Roles
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-code-fork"></i>
		ROLES
		<small>Gestionar roles en el sistema</small>
	</h1>
@endsection

@section('breadcrumbs')
{{ breadcrumbs('roles') }}
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-list"></i> LISTA DE ROLES</h3>

	 	<div class="box-tools">
			@can('roles.create')
			<a href="{{ route('roles.create') }}" class="btn btn-flat btn-sm btn-primary">
				<i class="fa fa-plus-circle"></i> NUEVO ROL
			</a>
			@endcan
	  	</div>
	</div>
	<div class="box-body">
		<table id="roles" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th width="10px">#</th>
					<th>NOMBRE ROL</th>
					<th>DESCRIPCION</th>
					<th>URL</th>
					<th>PERMISOS</th>
					<th>USUARIOS</th>
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
    let tabla = $('#roles').DataTable({
		responsive: true,
    	autoWidth:false,
		language: {
			url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
			searchPlaceholder: "Buscar rol..."
		},
		order: [[ 0, "asc" ]],
		processing: true,
		serverSide: true,
		ajax: '{!! route('roles.apiRoles') !!}',
		columns: [
			{ data: 'numero_index'},
			{ data: 'name'},
			{ data: 'description'},
			{ data: 'slug'},
			{ data: 'permisos'},
			{ data: 'usuarios'},
			{ data: 'action', orderable: false, searchable: false},
		],
	});
	const eliminarRole = id =>{
		let ruta = `${direccion}/administracion/roles/${id}/delete`
		eliminar(ruta,'rol',tabla)
	};
</script>
@endsection