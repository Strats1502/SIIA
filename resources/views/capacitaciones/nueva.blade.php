@extends('layout.app')

@section('title')
    Nueva Capacitación
@endsection

@section('cabecera')
    Capacitaciones
@endsection

@section('head')
    <script type="text/javascript" src="{{url('/js/jquery.validate.js')}}"></script>
@endsection

@section('contenedor')
    <div class="row">
        <h2>Nueva Capacitación</h2>
    </div>
    <div class="row">
        @foreach($errors->all() as $error)
            <div class="red-text">{{$error}}</div>
        @endforeach
        @include('capacitaciones.nuevaForm')
    </div>

@endsection
