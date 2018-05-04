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
  <div class="col s12" style="margin-bottom: 30px">
    <a href="{{url('escuelas')}}">Escuelas</a>
    <span>></span>
    <a href="{{url('escuelas/'.$escuela->id)}}">Detalle Escuela</a>
  </div>

  <div class="row">
    <div class="col s12">
      @if(count($escuela->campus) != 0 )
        @foreach($escuela->campus as $campus)
          <ul class="collapsible">
            <li>
              <div class="collapsible-header"><i class="material-icons">location_city</i>{{$campus->nombre}}</div>
              <div class="collapsible-body" style="padding: 20px;">
                <span style="margin-bottom: 10px;" class="col s12">{{$campus->direccion}}</span>
                @foreach($campus->carreras as $carrera)
                  <div>
                    <a class="" href="{{url('escuelas/campus/'.$carrera->id)}}"><i class="material-icons">school</i> {{$carrera->nombre}}</a>
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
        <a class="btn-floating btn-large red">
          <i class="large material-icons">add</i>
        </a>
      </div>

    </div>
  </div>
            


@endsection
