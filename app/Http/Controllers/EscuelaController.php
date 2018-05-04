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

}
