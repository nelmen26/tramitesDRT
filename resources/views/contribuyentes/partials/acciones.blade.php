@canatleast(['contribuyentes.edit','contribuyentes.destroy'])
<div class="btn-group pull-right">
	<button type="button" class="btn btn-flat btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Acciones <span class="fa fa-caret-down"></span></button>
	<ul class="dropdown-menu">
		@can('contribuyentes.edit')
		<li><a href="{{ route('contribuyentes.edit',$id) }}"><i class="fa fa-edit"></i> Editar</a></li>
		@endcan
		@can('contribuyentes.destroy')
		<li><a href="javascript:void(0);" onclick="eliminarContribuyente({{ $id }}); return false;"><i class="fa fa-trash"></i> Eliminar</a></li>
		@endcan
	</ul>
</div>
@endcanatleast