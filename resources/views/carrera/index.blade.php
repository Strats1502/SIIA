@extends('layout.app')

@section('title')
  Carreras
@endsection

@section('cabecera')
  Carreras
@endsection

@section('head')
  <script src="{{url('/js/escuela/index.js')}}"></script>
@endsection

@section('contenedor')
  <div class="col s12">
    <a href="{{url('carreras')}}">Carreras</a>
  </div>

  <div class="row">
    <div class="col s12">
      @if(count($carreras) != 0 )
        @foreach($carreras as $carrera)
        <div class="col s4">
          <a href="{{url('escuelas/'.$carrera->id)}}">
          <div class="card">
            <div class="card-image">
              <img style="max-height: 400px;" src="{{$carrera->ruta_imagen}}">
              <a href="{{url("carreras/eliminar/$carrera->id")}}" class="btn-floating halfway-fab waves-effect waves-light red right"><i class="material-icons">delete</i></a>
              <a href="{{url("carreras/editar/$carrera->id")}}" class="btn-floating halfway-fab waves-effect waves-light red right"><i class="material-icons">edit</i></a>
            </div>
            <div class="card-content" style="background: #ecf0f1;">
              <span class="card-title">{{$carrera->nombre}}</span>
              <p>Esta carrera cuenta con {{count($carrera->reticulas)}} reticulas</p>
            </div>
          </div>
        </div></a>
        @endforeach
      @else
        <div class="error">Aun no hay carreras registradas</div>
      @endif

      

    </div>
  </div>

  
  <div class="fixed-action-btn action-btn-pos">
        <a href="{{url('carreras/nuevo')}}" class="btn-floating btn-large waves-effect waves-light btn accent-color">
            <i class="material-icons">add</i>
        </a>
      </div>
            


@endsection
