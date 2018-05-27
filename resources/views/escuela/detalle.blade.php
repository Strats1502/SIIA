@extends('layout.app')

@section('title')
  Escuelas
@endsection

@section('cabecera')
  Escuelas
@endsection

@section('head')
  <script src="{{url('/js/escuela/detalle.js')}}"></script>
@endsection

@section('contenedor')
  <div class="row">
    <div class="col s12">
      @if( count($escuela->campus) != 0 )
        @foreach($escuela->campus as $campus)
          <ul class="collapsible">
            <li>
              <div class="collapsible-header"><i class="material-icons">location_city</i>{{$campus->nombre}}</div>
              <div class="collapsible-body" style="padding: 20px;">
                <span style="margin-bottom: 10px;" class="col s12">{{$campus->direccion}}</span>
                @foreach($campus->carreras as $carrera)
                  <div>
                    <a class="" href="{{url('escuelas/carrera/'.$carrera->id)}}"><i class="material-icons">school</i>{{$carrera->nombre}}</a>
                  </div>
                @endforeach
              </div>
            </li>
          </ul>
        @endforeach
      @else
        <div class="error">Aun no hay campus registrados en esta escuela.</div>
      @endif

      <div class="fixed-action-btn">
        <a href="#modalNuevoCampus" class="btn-floating btn-large red">
          <i class="large material-icons">add</i>
        </a>
      </div>

    </div>
  </div>

  <div id="modalNuevoCampus" class="modal">
    <div class="row">
        <h2>Nueva escuela</h2>
    </div>
    <div class="row">
        @foreach($errors->all() as $error)
            <div class="red-text">{{$error}}</div>
        @endforeach
        <form id="form-crear" method="post" action="{{url('/escuelas/crear')}}" class="col s12" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="row">

                <div class="btn accent-color">
                    <span>Imagen</span>
                    <input type="file" id="imagen" name="imagen" >
                </div>

                <div class="input-field col s12 ">
                    <input  id="nombre" name="nombre" type="text" maxlength="70">
                    <label for="nombre">Nombre</label>
                </div>

            </div>

            <div class="col s12">
                <input class="input-field btn right accent-color" type="submit" value="Registrar">
            </div>
        </form>
    </div>
  </div>

@endsection
