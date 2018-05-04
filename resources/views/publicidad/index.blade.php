@extends('layout.app')

@section('title')
    Publicidad
@endsection

@section('cabecera')
    Publicidad
@endsection

@section('head')
    <script type="text/javascript" src="{{url('/js/pub/index.js')}}"></script>
    <script type="text/javascript" src="{{url('/js/jquery.validate.js')}}"></script>
@endsection

@section('contenedor')
    <!--Modal eliminar-->
    <div id="delete-modal" class="modal">
        <form action="{{url('/publicidad/eliminar')}}" method="post">
            <div class="modal-content">
                <h4>Confirmar</h4>
                <p id="delete-message">¿Desea eliminar la publicidad?</p>
                <input type="hidden" name="id-eliminar" id="id-eliminar">
                <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
            </div>
            <div class="modal-footer">
                <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
                <input type="submit" href="#" class="waves-effect waves-green btn-flat"  value="Sí" id="yesBtn"/>
            </div>
        </form>
    </div>

    <div class="row">
        <h5>Publicidad</h5>
    </div>
    <!-- Iteración para mostrar los anuncios -->
    @include('publicidad.lista')

    <!-- Cuando no se encuentra ningún anuncio -->
    @if(count($anuncios) == 0 )
        <p>No se encontraron anuncios, para agregar uno presione el botón de +</p>
    @endif

    <div class="fixed-action-btn" style="bottom: 10px; right: 24px;">
        <a href="{{url('/publicidad/nueva')}}" class="btn-floating btn-large waves-effect waves-light btn modal-trigger accent-color">
            <i class="material-icons" id="new-Pub">add</i>
        </a>
    </div>
@endsection

