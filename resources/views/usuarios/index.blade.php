@extends('layout.app')

@section('title')
    Usuarios
@endsection

@section('head')
    <script type="text/javascript" src="{{url('/js/usuarios/index.js')}}"></script>
@endsection

@section('cabecera')
    {{trans('str.menu.menu_1.titulo')}}
@endsection

@section('contenedor')

    <!-- Cuerpo del index -->
    <div class="row">

        <h5>Usuarios</h5>
        <!--<div class="col s4 offset-s8">
            <div class="left-align">
                <div class="input-field">
                    <i class="material-icons prefix">search</i>
                    <input id="icon_search" placeholder="{{trans('str.menu.general.placeholder_buscar')}}" type="text">

                </div>
            </div>
        </div>-->
    </div>

    @include('usuarios.lista')

    <!-- Botón flotante de + -->
    <div class="fixed-action-btn action-btn-pos">
        <a href="{{url('usuario/nuevo')}}" class="btn-floating btn-large waves-effect waves-light btn accent-color">
            <i class="material-icons">add</i>
        </a>
    </div>
@endsection
