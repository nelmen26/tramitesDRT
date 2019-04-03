@canatleast(['users.edit','users.destroy'])
<div class="btn-group pull-right">
	<button type="button" class="btn btn-flat btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Acciones <span class="fa fa-caret-down"></span></button>
	<ul class="dropdown-menu">
		@can('users.edit')
		<li><a href="{{ route('users.edit',$id) }}"><i class="fa fa-edit"></i> Editar</a></li>
		@endcan
		@can('users.destroy')
		<li><a href="javascript:void(0);" onclick="eliminarUser({{ $id }}); return false;"><i class="fa fa-trash"></i> Eliminar</a></li>
		@endcan
	</ul>
</div>
@endcanatleast