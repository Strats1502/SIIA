@extends('layout.app')

@section('title')
    {{trans('str.menu.home.titulo')}}
@endsection

@section('head')
    <script type="text/javascript" src="{{url('/js/jquery.validate.js')}}"></script>
@endsection

@section('cabecera')
    {{trans('str.menu.home.titulo')}}
@endsection

@section('contenedor')
    <style>
        .container {
            width: 60% !important;
        }
    </style>
    <!-- Cuerpo del index -->
    <div class="row">
        <div class="rowsection" id="table">
            <center><h1>Bienvenido</h1></center>
            <center><img style="width:200px; height:200px"src="{{trans('str.menu.home.icono')}}"/></center>
        </div>
    </div>
    <!--Modal para eliminar joven-->
    <div id="modal-borrar" class="modal">
        <form action="{{url('/empresarios/borrar')}}" method="post">
            <div class="modal-content">
                <h4>Confirmar</h4>
                <p id="delete-message">¿Desea eliminar este elemento?</p>
                <input type="hidden" name="id_usuario" id="id_usuario">
                <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
            </div>
            <div class="modal-footer">
                <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
                <input type="submit" href="#" class="waves-effect waves-green btn-flat"  value="Sí" id="yesBtn"/>
            </div>
        </form>
    </div>
@endsection
