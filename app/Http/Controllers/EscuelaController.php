<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\FileUtils;
use App\Escuela;
use App\Carrera;

class EscuelaController extends Controller {
    

  public function index() {
    $escuelas = Escuela::all();

    return view('escuela.index', array(
      'escuelas' => $escuelas
    ));
  }

  public function detalleEscuela($id) {
    $escuela = Escuela::find($id);
    
    // dd($escuela->campus[0]->carreras);
    
    return view('escuela.detalle', array(
      'escuela' => $escuela
    ));
  }

  public function nuevo(Request $request) {
    return view('escuela.nuevo');
  }

  public function vistaEditar($id) {
    $escuela = Escuela::find($id);
    return view('escuela.editar', array('escuela' => $escuela));
  }

  public function crear(Request $request) {
    $this->validate($request, [
      'nombre' => 'required'
    ]);

    $nombre = $request->input('nombre');
    $imagen = $request->file('imagen');
    $ruta_imagen = FileUtils::guardar($imagen, 'storage/convocatorias/', 'escuela_');

    Escuela::create([
      'nombre' => $nombre,
      'ruta_imagen' => $ruta_imagen 
    ]);

    return redirect('escuelas');
  }

  public function editar(Request $request) {
    $this->validate($request, [
      'id' => 'required',
      'nombre' => 'required'
    ]);

    $id = $request->input('id');
    $nombre = $request->input('nombre');
    $imagen = $request->file('imagen');
    $ruta_imagen = null;
    if($imagen != null) $ruta_imagen = FileUtils::guardar($imagen, 'storage/convocatorias/', 'escuela_');

    $escuela = Escuela::find($id);
    $escuela->nombre = $nombre;
    if ($ruta_imagen != null) $escuela->ruta_imagen = $ruta_imagen;
    $escuela->save();

    return redirect('escuelas');
  }

  public function eliminar($id) {
    $escuela = Escuela::find($id);
    $escuela->delete();
    return redirect('escuelas');
  }

  public function detalleCarrera($id){
    $carrera = Carrera::find($id);

    dd($carrera);
  }

  public function crearCampus(Request $request){
    dd($request->all());
  }
  


}
