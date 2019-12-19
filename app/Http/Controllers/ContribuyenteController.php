<?php

namespace SIS\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use SIS\Contribuyente;
use Illuminate\Http\Request;
use SIS\Http\Requests\ContribuyenteRequest;
use Yajra\DataTables\Facades\DataTables;

class ContribuyenteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function apicontribuyentes()
    {
        // if(auth()->user()->isRole('admin'))
            $contribuyentes = Contribuyente::orderBy('id','ASC')->get();
        // else
            // $contribuyentes = contribuyente::where('user_recibido',auth()->user()->nombre)->where('estado','!=','D')->where('estado','!=','O')->where('estado','!=','F')->orwhere('fecha_recibido',null)->where('area_id',auth()->user()->area_id)->orderBy('id','ASC')->get();
        
        
        
        return DataTables::of($contribuyentes)
                    ->addIndexColumn()
                    
                    ->addColumn('action','contribuyentes.partials.acciones')
                    ->rawColumns(['action'])
                    ->toJson();
    }

    public function index()
    {
        return view('contribuyentes.index');
    }

    public function create()
    {
        return view('contribuyentes.create');
    }

    public function store(ContribuyenteRequest $request)
    {
        $contribuyente = Contribuyente::create($request->all());
        
        Toastr::success('contribuyente creado con exito','Correcto!');

        return redirect()->route('contribuyentes.index');
    }

    public function edit(contribuyente $contribuyente)
    {
        return view('contribuyentes.edit',compact('contribuyente'));
    }

    public function update(ContribuyenteRequest $request, contribuyente $contribuyente)
    {
        $contribuyente->fill($request->all());
        
        $contribuyente->save();
        Toastr::info('contribuyente actualizado con exito','Actualizado!');
        return redirect()->route('contribuyentes.index');
    }

    public function destroy(contribuyente $contribuyente)
    {
        $contribuyente->delete();

        return response()->json();
    }
}
