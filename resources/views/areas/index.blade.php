@extends('layouts.master')

@section('title')
    Areas
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-users"></i>
		AREAS
		<small>Gestionar areas en el sistema</small>
	</h1>
@endsection
@section('breadcrumbs')
{{ breadcrumbs('areas') }}
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-list"></i> LISTA DE AREAS</h3>

	 	<div class="box-tools">
			@can('areas.create')
			<a href="{{ route('areas.create') }}" class="btn btn-flat btn-sm btn-primary">
				<i class="fa fa-plus-circle"></i> NUEVA AREA
			</a>
			@endcan
	  	</div>
	</div>
	<div class="box-body">
		<table id="areas" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th width="10px">#</th>
					<th>AREA</th>
					<th>DESCRIPCION</th>
					<th>ESTADO</th>
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
    let tabla = $('#areas').DataTable({
		responsive: true,
		autoWidth:false,
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar area..."
        },
        order: [[ 0, "asc" ]],
        processing: true,
        serverSide: true,
        ajax: '{!! route('areas.apiAreas') !!}',
        columns: [
            { data: 'numero_index'},
            { data: 'nombre'},
            { data: 'descripcion'},
            { data: 'activo'},
            { data: 'action', orderable: false, searchable: false},
        ],
	});
	const eliminarArea = id => {
		let ruta = `${direccion}/configuracion/areas/${id}/delete`
		eliminar(ruta,'area',tabla)
	};
</script>
@endsection