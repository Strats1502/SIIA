@extends('layout.app')

@section('title')
    {{ $titulo }}
@endsection

@section('head')
    <script type="text/javascript" src="{{url('/js/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{url('/js/eventos/detalle.js')}}"> </script>
@endsection


@section('contenedor')
    <div class="row">
        
    <h5>{{$evento->titulo ? $evento->titulo : $titulo}}</h5>
    </div>
    <div class="row" style="height: 350px;">
        <div id="map" style="height: 100%;"></div>
    </div>

    <div id="deleteModalDoc" class="modal">
        <div class="modal-content">
            <h4>Confirmar</h4>
            <p id="delete-message">¿Desea eliminar el documento?</p>
            <input type="hidden" name="id-eliminar" id="id-eliminar">
            <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
        </div>
        <div class="modal-footer">
            <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
            <input type="submit" href="#" class="waves-effect waves-green btn-flat"  value="Sí" id="yesBtn"/>
        </div>
    </div>
    <div class="row">

        <form class="col s12" action="{{ url('/eventos/guardar') }}" method="post"   enctype="multipart/form-data" id="form-nuevo-evento">
            <input type="hidden" name="input-deleted-docs" id="input-deleted-docs" value="[]">
            <div class="row">
                <div class="s12 center-align">
                <img id="img-evento" src="{{$evento->ruta_imagen}}" height="200" alt=""></div>
                <div class="file-field input-field col s12 l6 offset-l3">
                    <div class="btn accent-color">
                        <span>Imagen</span>
                        <input type="file" id="imagen" name="imagen" >
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" value="{{$evento->ruta_imagen}}" placeholder="Cambiar imagen">
                    </div>
                </div>
            </div>

            <input type="hidden" id="posicion" name="posicion" value="">
            <input type="hidden" id="accion" name="accion" value="{{$accion}}">
            <input type="hidden" id="id_evento" name="id_evento" value="{{$evento->id_evento}}">
            <div class="row">
                <div class="input-field col s12">
                    <input id="titulo" type="text" class="vald" name="titulo" maxlength="100" value="{{ $evento->titulo }}" required>
                    <label for="titulo">Título</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="descripcion" class="materialize-textarea vald" name="descripcion" maxlength="200" required>{{ $evento->descripcion }}</textarea>
                    <label for="descripcion">Descripción</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input id="fecha-inicio" type="text" class="datepicker vald" value="{{ $fecha_inicio }}" name="fecha_inicio" required>
                    <label for="fecha-inicio">Fecha de inicio</label>
                </div>
                <div class="input-field col s6">
                    <input id="hora-inicio" type="text" class="timepicker vald" value="{{ date_format(date_create($hora_inicio), 'H:i') }}" name="hora_inicio" required>
                    <label for="hora-inicio">Hora de inicio</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="fecha-fin" type="text" class="datepicker vald" value="{{ $fecha_fin }}" name="fecha_fin" required>
                    <label for="fecha-fin">Fecha de finalización</label>
                </div>
                <div class="input-field col s6">
                    <input id="hora-fin" type="text" class="timepicker vald" value="{{ date_format(date_create($hora_fin), 'H:i') }}" name="hora_fin" required>
                    <label for="hora-fin">Hora de finalización</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="number" class="vald" id="puntos-otorgados" value="{{ $evento->puntos_otorgados }}" name="puntos-otorgados" required>
                    <label for="puntos-otorgados">Puntos otorgados</label>
                </div>
                <div class="input-field col s6">
                    <select required id="area_id" name="area_id" class="validate">
                        <option value="" disabled>Elige una opción</option>
                        @foreach($areas as $area)
                            @if($area->id == $evento->area_id)
                                <option value="{{$area->id}}" selected>{{$area->nombre}}</option>
                            @else
                                <option value="{{$area->id}}" >{{$area->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                    <label>Área</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <select required id="tipo-evento" name="tipo-evento" class="validate">
                        <option value="" disabled>Elige una opción</option>
                        @foreach($tipos as $tipo)
                            @if($evento->id_tipo_evento == $tipo->id_tipo_evento)
                             <option value="{{$tipo->id_tipo_evento}}" selected>{{$tipo->nombre}}</option>
                            @else
                             <option value="{{$tipo->id_tipo_evento}}">{{$tipo->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                    <label>Tipo de evento</label>
                    <input type="hidden" name="tipo-seleccionado" val="{{$evento->id_tipo_evento}}" id="tipo-seleccionado">
                </div>
            </div>

             <div class="divider"></div>
                <div class="section" id="doc-container">
                    <h5>Documentos</h5>
                        @foreach($evento->documentos as $index => $documento)

                        <div class="section hoverable">
                                <input type="hidden" name="doc-id[]" value="{{$documento->id or ''}}">
                            <div class="row">
                                <div class="col m2 hide-on-small-and-down">
                                    <span class="col l12 center-align">
                                    @if($documento->id_formato == 1)
                                        <img src="{{url('/img/ic_pdf.png')}}" alt="">
                                    @elseif($documento->id_formato == 2)
                                        <img src="{{url('/img/ic_doc.png')}}" alt="">
                                    @elseif($documento->id_formato == 3)
                                        <img src="{{url('/img/ic_xls.png')}}" alt="">
                                    @else
                                        <img src="{{url('/img/ic_unknow.png')}}" alt="">
                                    @endif
                                    </span>
                                </div>
                                <div class="input-field col s5 l6">
                                    <input id="doc-titulo[]" name="doc-titulo[]" type="text" value="{{$documento->titulo or ''}}" class="validate">
                                    <label for="titulo">Título</label>
                                </div>
                                <div class="file-field input-field col s5 m3 l2 ">
                                    <div class="btn accent-color">
                                        <span>Cambiar </span>
                                        <input type="file" class="input-doc-file" name="doc-file-{{$documento->id or ''}}" >
                                    </div>
                                </div>
                                <div class="col s2">
                                    <p class="col s12 center-align">
                                        <a data-id="{{$documento->id or ''}}" class="large center center-align delete-doc grey-text" style="margin-top:30px; cursor: pointer" ><i class="material-icons">delete</i></a>
                                    </p>
                                </div>
                            </div>
                            </div>
                        @endforeach


                </div>

                 <div class="row">
                    <div class="col s1 offset-s5">
                        <a class="btn-floating center waves-effect waves-light  center-align accent-color right" id="agregar-documento"><i class="material-icons">add</i></a>
                    </div>
                </div>
                <input class="input-field btn right primary-color" type="submit" value="Guardar">



        </form>
    </div>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: Number('{{ $latitud }}'),
                    lng: Number('{{ $longitud }}')
                },
                zoom: 15
            });
            var marca = null;

            var pos = {
                lat: Number('{{ $latitud }}'),
                lng: Number('{{ $longitud }}')
            };

            marca = new google.maps.Marker({
                position: pos,
                map: map,
                draggable: true,
                title: 'Evento'
            });

            $('#posicion').val(marca.getPosition());
            map.setCenter(pos);

            map.addListener('mouseout', function() {
                $('#posicion').val(marca.getPosition());
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHm6Cez6yYXKGHBxPBGFZtFUuJ_O8FOwI&callback=initMap"
            async defer></script>
    <script type="text/javascript">
        @if(isset($mensaje))
            Materialize.toast('{{ $mensaje }}', 4000, "red");
        @endif
    </script>
@endsection
