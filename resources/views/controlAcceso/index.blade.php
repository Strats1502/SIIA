@extends('layout.app')

@section('title')
    Eventos
@endsection

@section('cabecera')
    Eventos
@endsection

@section('head')
    <script type="text/javascript" src="{{url('/js/controlAcceso/index.js')}}"> </script>
@endsection

@section('contenedor')


    <!--Modal eliminar-->
    <div id="deleteModalEv" class="modal">
        <form action="{{url('/control-acceso/eliminar')}}" method="post">
            <div class="modal-content">
                <h4>Confirmar</h4>
                <p id="delete-message">{{trans('str.menu.menu_10.deleteMessage')}}</p>
                <input type="hidden" name="idLista" id="id-eliminar">
                <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
            </div>
            <div class="modal-footer">
                <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
                <input type="submit" href="#" class="waves-effect waves-green btn-flat"  value="Sí" id="yesBtn"/>
            </div>
        </form>
    </div>

    <div class="row">


    <h5>{{trans('str.menu.menu_10.titulo')}}</h5>
        <table class="highlight">
            <thead>
            <tr>
                <th data-field="titulo">{{trans('str.menu.menu_10.tabla.col0')}}</th>
                <th data-field="descripcion">{{trans('str.menu.menu_10.tabla.col1')}}</th>
                <th data-field="fecha_inicio">{{trans('str.menu.menu_10.tabla.col2')}}</th>
                <th data-field="fecha_fin">{{trans('str.menu.menu_10.tabla.col3')}}</th>
                <th data-field="fecha_fin">{{trans('str.menu.menu_10.tabla.col4')}}</th>
                <th data-field="fecha_fin">{{trans('str.menu.menu_10.tabla.col5')}}</th>
            </tr>
            </thead>

            <tbody id="tabla-eventos">
                {{--@foreach($listas as $lista)
                  
                    <!-- @include('eventos.vista_evento', ['evento' => $evento]) -->
                @endforeach--}}
            </tbody>
        </table>
    </div>


    <div class="paginacion">
        {{-- $eventos->links() --}}
    </div>

    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Detalles del evento</h4>
            <p>
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="titulo" type="text" class="vald">
                            <label for="titulo">Título</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="descripcion" class="materialize-textarea vald"></textarea>
                            <label for="descripcion">Descripción</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="fecha-inicio" type="text" class="datepicker vald" >
                            <label for="fecha-inicio">Fecha de inicio</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="hora-inicio" type="text" class="timepicker vald">
                            <label for="hora-inicio">Hora de inicio</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="fecha-fin" type="text" class="datepicker vald">
                            <label for="fecha-fin">Fecha de finalización</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="hora-fin" type="text" class="timepicker vald">
                            <label for="hora-fin">Hora de finalización</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select required id="tipo" class="validate">
                                <option value="" disabled>Elige una opción</option>
                                <option value="1" selected>Competencia de deportista olímpico</option>
                                <option value="2">Información general</option>
                            </select>
                            <label>Tipo de evento</label>
                        </div>

                    </div>
                </form>
            </div>
            </p>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action waves-effect waves-green btn-flat" id="guardar-evento">Guardar</a>
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
        </div>
    </div>
    <!-- Botón flotante de + -->
    <div class="fixed-action-btn action-btn-pos">
        <a href="{{url('eventos/nuevo')}}" class="btn-floating btn-large waves-effect waves-light btn accent-color">
            <i class="material-icons">add</i>
        </a>
    </div>
    <div class="fixed-action-btn" id="delete-selection" style="display:none; bottom: 10px; right: 100px;">
        <a class="btn-floating btn-large waves-effect waves-light btn accent-color">
            <i class="material-icons" id="new-event">delete</i>
        </a>
    </div>
@endsection
