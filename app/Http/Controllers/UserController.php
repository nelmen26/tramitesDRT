<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\UserStoreRequest;
use SIS\Http\Requests\UserUpdateRequest;
use SIS\Http\Requests\UserPasswordRequest;

use SIS\User;
use Caffeinated\Shinobi\Models\Role;
use Toastr;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function apiUsers()
    {
        $users = User::orderBy('nombre','ASC')->get();
        return Datatables::of($users)
                    ->addIndexColumn()
                    ->addColumn('estado', function($user){
                        return $user->estado == 'A'
                                    ? '<span class="label label-success">'.$user->fullestado.'</span>'
                                    : '<span class="label label-danger">'.$user->fullestado.'</span>';
                    })
                    ->addColumn('rol', function($user){
                        $rol = '';
                        foreach($user->roles as $role){
                            $rol .= '<span class="label label-primary">' .$role->slug.'</span> ';
                        }
                        return $rol;
                    })
                    ->addColumn('action','users.partials.acciones')
                    ->rawColumns(['action','rol', 'estado'])
                    ->toJson();
    }

    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        $roles = Role::orderBy('name','ASC')->pluck('slug','id');
        return view('users.create', compact('roles'));
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->all());
        if($request->roles!=[])
        {
            $user->syncRoles($request->roles);
        }
        Toastr::success('User creado con exito','Correcto!');

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('name','ASC')->pluck('slug','id');
        return view('users.edit',compact('user','roles'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->fill($request->all());
        if($request->password){
            $user->fill([
                'password'=>$request->password
            ])->save();
        }
        $user->save();
        $request->roles!=[] ? $user->syncRoles($request->roles) : $user->revokeAllRoles();
        Toastr::info('User actualizado con exito','Actualizado!');
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json();
    }

    public function perfil()
    {
        $user = auth()->user();
        return view('users.perfil',compact('user'));
    }

    public function updatepassword(UserPasswordRequest $request, User $user)
    {
        $user->password=$request->password;
        $user->save();
        Toastr::info('Su contraseña fue cambiado satisfactoriamente','Password!');
        return back();
    }
}
