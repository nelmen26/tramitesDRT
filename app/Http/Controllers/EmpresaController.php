<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;
use SIS\Http\Requests\EmpresaRequest;

use SIS\Empresa;
use Toastr;
use Storage;

class EmpresaController extends Controller
{
  public function __construct(){
		$this->middleware('auth');
	}

	public function index()
	{
		$empresa = Empresa::find(1);
		return view('empresas.index',compact('empresa'));
	}

	public function store(EmpresaRequest $request)
	{
		$empresa = Empresa::find(1);
		$empresa->fill($request->all());
		$empresa->save();

		Toastr::info('Datos de la empresa fueron actualizados correctamente','Actualizar!');
		return back();
	}

	public function upload(Request $request, Empresa $empresa)
	{
		$file = $request->file('file');
		$carpeta = 'empresa';
		$tipo = $file->guessExtension();
		$nombre = str_slug($empresa->nombre);
		Storage::disk('imagen')->put($carpeta.'/'.$nombre.'.'.$tipo,\File::get($file));
		$empresa->logo = $nombre.'.'.$tipo;
		$empresa->save();
		Toastr::info('El logo de la empresa fue actualiza correctamente','Logo!');
		return reponse()->json();
	}

}