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

  <h4>Crear nuevo campus</h4>
  <form action="{{url('escuelas/campus/nuevo')}}">
    {{csrf_field()}}
    <input type="hidden" value="{{$escuela->id}}">
    <div class="input-field">
      <input id="nombre" type="text" name="nombre">
      <label for="nombre">Nombre: </label>
    </div>
    <div class="input-field">
      <input id="direccion" type="text" name="direccion">
      <label for="direccion">Dirección: </label>
    </div>
    <button type="submit">Guardar</button>
  </form>
  

@endsection
