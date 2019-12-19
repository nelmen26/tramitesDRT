<?php

namespace SIS\Http\Controllers;

use SIS\Area;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
// use Brian2694\Toastr\Toastr;
use SIS\Http\Requests\AreaRequest;
use Brian2694\Toastr\Facades\Toastr;

class AreaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function apiareas()
    {
        $areas = Area::orderBy('id','ASC')->get();
        
        return DataTables::of($areas)
                    ->addIndexColumn()
                    ->addColumn('activo', function($area){
                        return $area->activo == 1
                                    ? '<span class="label label-success">'.$area->fullestado.'</span>'
                                    : '<span class="label label-danger">'.$area->fullestado.'</span>';
                    })
                    
                    ->addColumn('action','areas.partials.acciones')
                    ->rawColumns(['action','activo'])
                    ->toJson();
    }

    public function index()
    {
        return view('areas.index');
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(AreaRequest $request)
    {
        $area = Area::create($request->all());
        
        Toastr::success('area creado con exito','Correcto!');

        return redirect()->route('areas.index');
    }

    public function edit(area $area)
    {
        return view('areas.edit',compact('area'));
    }

    public function update(AreaRequest $request, area $area)
    {
        $area->fill($request->all());
        
        $area->save();
        Toastr::info('area actualizado con exito','Actualizado!');
        return redirect()->route('areas.index');
    }

    public function destroy(area $area)
    {
        $area->delete();

        return response()->json();
    }
}
