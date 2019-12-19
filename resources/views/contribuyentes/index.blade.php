@extends('layouts.master')

@section('title')
    Contribuyentes
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-users"></i>
		CONTRIBUYENTES
		<small>Gestionar contribuyentes en el sistema</small>
	</h1>
@endsection
@section('breadcrumbs')
{{ breadcrumbs('contribuyentes') }}
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-list"></i> LISTA DE CONTRIBUYENTES</h3>

	 	<div class="box-tools">
			@can('contribuyentes.create')
			<a href="{{ route('contribuyentes.create') }}" class="btn btn-flat btn-sm btn-primary">
				<i class="fa fa-plus-circle"></i> NUEVO CONTRIBUYENTE
			</a>
			@endcan
	  	</div>
	</div>
	<div class="box-body">
		<table id="contribuyentes" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th width="10px">#</th>
					<th>CARNET</th>
					<th>CONTRIBUYENTE</th>
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
    let tabla = $('#contribuyentes').DataTable({
		responsive: true,
		autoWidth:false,
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar contribuyente..."
        },
        order: [[ 0, "asc" ]],
        processing: true,
        serverSide: true,
        ajax: '{!! route('contribuyentes.apiContribuyentes') !!}',
        columns: [
            { data: 'numero_index'},
            { data: 'carnet'},
            { data: 'nombres'},
            { data: 'action', orderable: false, searchable: false},
        ],
	});
	const eliminarContribuyente = id => {
		let ruta = `${direccion}/contribuyentes/${id}/delete`
		eliminar(ruta,'contribuyente',tabla)
	};
</script>
@endsection