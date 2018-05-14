@extends('layout.app')

@section('title')
  Escuelas
@endsection

@section('cabecera')
  Escuelas
@endsection

@section('head')
  <script src="{{url('/js/escuela/index.js')}}"></script>
@endsection

@section('contenedor')
  <div class="col s12">
    <a href="{{url('escuelas')}}">Escuelas</a>
  </div>

  <div class="row">
    <div class="col s12">
      @if(count($escuelas) != 0 )
        @foreach($escuelas as $escuela)
        <div class="col s12 m4">
          <a href="{{url('escuelas/detalle/'.$escuela->id)}}">
            <div class="card">
              <div class="card-image">
                <img style="max-height: 400px;" src="{{$escuela->ruta_imagen}}">
                <a href="{{url('escuelas/editar/'.$escuela->id)}}" class="btn-floating halfway-fab waves-effect waves-light accent-color right"><i class="material-icons">edit</i></a>
                <a href="{{url('escuelas/eliminar/'.$escuela->id)}}" class="btn-floating waves-effect waves-light accent-color delete-card"><i class="material-icons">close</i></a>
              </div>
              <div class="card-content primary-color text-primary-color">
                <span class="card-title">{{$escuela->nombre}}</span>
                <p class="secondary-text-color">Esta escuela cuenta con {{count($escuela->campus)}} campus y {{count($escuela->campus)}} carreras</p>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      @else
        <div class="error">Aun no hay escuelas registradas</div>
      @endif

      

    </div>
  </div>

  
  <div class="fixed-action-btn action-btn-pos">
        <a href="{{url('escuelas/nuevo')}}" class="btn-floating btn-large waves-effect waves-light btn accent-color">
            <i class="material-icons">add</i>
        </a>
      </div>
            


@endsection
