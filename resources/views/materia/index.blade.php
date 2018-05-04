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
      @if(count($materias) != 0 )
        <table>
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Clave</th>
              <th>Horas Teoría</th>
              <th>Horas Práctica</th>
              <th>Créditos</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            @foreach($materias as $materia)
              <tr>
                <td>{{$materia->nombre}}</td>
                <td>{{$materia->clave}}</td>
                <td>{{$materia->horas_teoria}}</td>
                <td>{{$materia->horas_practica}}</td>
                <td>{{$materia->creditos}}</td>
                <td><a data-materia-id="{{$materia->id}}"><i class="material-icons">edit</i></a></td>
                <td><a data-materia-id="{{$materia->id}}"><i class="material-icons">delete</i></a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <div class="error">Aun no hay materias registradas</div>
      @endif

    </div>
  </div>

  <div class="fixed-action-btn action-btn-pos">
        <a href="{{url('escuelas/nuevo')}}" class="btn-floating btn-large waves-effect waves-light btn accent-color">
            <i class="material-icons">add</i>
        </a>
      </div>
            
@endsection
