<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escuela;

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


}
