<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\FileUtils;
use App\Escuela;

class EscuelaController extends Controller {
    

  public function index() {
    $escuelas = Escuela::all();

    return view('escuela.index', array(
      'escuelas' => $escuelas
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
    $ruta_imagen = $request->input('ruta_imagen');

    $escuela = Escuela::find($id);
    $escuela->nombre = $nombre;
    $escuela->ruta_imagen = $ruta_imagen;
    $escuela->save();

    return redirect('escuelas');
  }

}
