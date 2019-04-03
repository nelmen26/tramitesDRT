<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\RoleRequest;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Toastr;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function apiRoles()
    {
        $roles = Role::orderBy('id','ASC')->get();
        return Datatables::of($roles)
                    ->addIndexColumn()
                    ->addColumn('permisos', function($role){
                        if($role->special==null){
                            return '<span class="label label-primary"> Total de Permisos: '.$role->permissions->count().'</span>';
                        }
                        else{
                            return $role->special=='all-access'? '<span class="label label-success">ACCESO TOTAL</span>' : '<span class="label label-danger">ACCESO DENEGADO</span>';
                        }
                    })
                    ->addColumn('usuarios', function($role){
                        return '<i class="fa fa-users"></i>: <strong>'.$role->users()->count().'</strong>';
                    })
                    ->editColumn('slug', function($role){
                        return '<span class="label label-primary">'.$role->slug.'</span>';
                    })
                    ->addColumn('action','roles.partials.acciones')
                    ->rawColumns(['action','slug','permisos', 'usuarios'])
                    ->toJson();
    }

    public function index()
    {
        return view('roles.index');
    }

    public function create()
    {
        $permissions = Permission::all();
        $slugs = Permission::select('slug')->get();
        $slug = collect();
        foreach($slugs as $permission){
            $prueba = explode('.',$permission->slug);
            $slug->push($prueba[0]);
        }
        $slugs = $slug->unique();
        return view('roles.create',compact('permissions','slugs'));
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());
        $role->assignPermission($request->get('permissions'));

        Toastr::success('Rol creado con exito','Correcto!');

        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $slugs = Permission::select('slug')->get();
        $slug = collect();
        foreach($slugs as $permission){
            $prueba = explode('.',$permission->slug);
            $slug->push($prueba[0]);
        }
        $slugs = $slug->unique();
        return view('roles.edit',compact('role','permissions','slugs'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->fill($request->all());
        $role->save();
        $request->permissions!=[] ? $role->syncPermissions($request->permissions) : $role->revokeAllPermissions();

        Toastr::info('Rol actualizado con exito','Actualizado!');
        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->revokeAllPermissions();
        $role->delete();

        return response()->json();
    }
}
