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
        <div class="col s4">
          <a href="{{url('escuelas/'.$escuela->id)}}"><div class="card">
            <div class="card-image">
              <img style="max-height: 400px;" src="{{$escuela->ruta_imagen}}">
              <a href="{{url('escuelas/eliminar/$escuela->id')}}" class="btn-floating halfway-fab waves-effect waves-light red right"><i class="material-icons">delete</i></a>
              <a href="{{url('escuelas/editar/$escuela->id')}}" class="btn-floating halfway-fab waves-effect waves-light red right"><i class="material-icons">edit</i></a>
            </div>
            <div class="card-content" style="background: #ecf0f1;">
              <span class="card-title">{{$escuela->nombre}}</span>
              <p>Esta escuela cuenta con {{count($escuela->campus)}} campus y {{count($escuela->campus)}} carreras</p>
            </div>
          </div>
        </div></a>
        @endforeach
      @else
        <div class="error">Aun no hay escuelas registradas</div>
      @endif

      <!-- <div class="fixed-action-btn action-btn-pos">
        <a href="#modal_nuevo_campus" class="btn-floating btn-large waves-effect waves-light btn accent-color modal-trigger">
            <i class="material-icons">add</i>
        </a>
      </div> -->

    </div>
  </div>
            


@endsection
