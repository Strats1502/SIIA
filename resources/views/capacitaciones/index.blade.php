@extends('layout.app')

@section('title')
    Capacitaciones
@endsection

@section('cabecera')
    Capacitaciones
@endsection

@section('head')
    <script type="text/javascript" src="{{url('/js/capacitaciones/index.js')}}"></script>
@endsection

@section('contenedor')
    <!-- Cuerpo del index -->
    <div class="row">
        <h5>{{trans('str.menu.menu_9.titulo')}}</h5>
        
        <div class="col s4 offset-s8">
            <div class="left-align">
                <div class="input-field">
                   <i class="material-icons prefix">search</i>
                   <input id="icon_search" placeholder="{{trans('str.menu.general.placeholder_buscar')}}" type="text" class="validate">
                </div>
            </div>
        </div>

        <div class="col s1">
            <div class="fixed-action-btn">
                <a class="btn-floating btn-large waves-effect waves-light accent-color" href="{{url('capacitaciones/nueva')}}"><i class="material-icons">add</i></a>
            </div>      
        </div>
    </div>
    
    @include('capacitaciones.lista')
    <div class="modal-container">
        <div id="modal-borrar" style="width: 30%; top:40% !important;" class="modal">
            <form action="{{url('/capacitaciones/borrar')}}" method="post">
                <div class="modal-content">
                    <h4>Confirmar</h4>
                    <p id="delete-message">¿Desea eliminar este elemento?</p>
                    <input type="hidden" name="id_capacitacion" id="id_capacitacion">
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                </div>
                <div class="modal-footer">
                    <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
                    <input type="submit" href="#" class="waves-effect waves-green btn-flat"  value="Sí" id="yesBtn"/>
                </div>
            </form>
        </div>
    </div>

@endsection
