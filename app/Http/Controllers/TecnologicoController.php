<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TecnologicoController extends Controller {
    

    public function create(Request $request) {
        $this->validate($request, [
            'nombre' => 'required',
            'ruta_logo' => 'required',
            'direccion' => 'required'
        ]);

        $nombre = $request->input('nombre');
        $ruta_logo = $request->input();
    }
}
