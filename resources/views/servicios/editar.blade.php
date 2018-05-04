@extends('layout.app')

@section('title')
    Servicios
@endsection

@section('head')
    <script type="text/javascript" src="{{url('/js/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{url('/js/servicio/editar.js')}}"></script>
    <script> 
        $(function() {
            $("input[name=id_usuario_responsable]").val("{{$orden->usuarioResponsable->id}}");
            $("input[name=id_joven_responsable]").val("{{$orden->jovenResponsable->id}}");
            
            var ids = $("#id_usuarios_involucrados_aux").val();
            $("[name=id_usuarios_involucrados]").val(ids);
            ids = $("#id_beneficiados_relacionados_aux").val();
            $("[name=id_beneficiados_relacionados]").val(ids);

            //Funcion autocomplete usuarios involucrados
            var observerInvolucrados = new MutationObserver(function(mutations) {
              mutations.forEach(function(mutation) {
                if (mutation.addedNodes.length > 0) {
                    var idAñadido = mutation.addedNodes[0].getAttribute("data-id");
                    var valIniciales = $("#id_usuarios_involucrados_aux").val().split(",");

                    if($.inArray(idAñadido, valIniciales) >= 0){
                        $(mutation.addedNodes[0]).remove();
                    } else {
                        valIniciales.push(idAñadido);
                        $("#id_usuarios_involucrados_aux").val(valIniciales);
                    }
                }
              });    
            });

            var configInvolucrados = { attributes: true, childList: true, characterData: true };

            observerInvolucrados.observe(document.querySelector('#usuarios_involucrados .ac-input .ac-appender'), configInvolucrados);

            //Funcion autocomplete jovenes beneficiados
            var observerBeneficiados = new MutationObserver(function(mutations) {
              mutations.forEach(function(mutation) {
                if (mutation.addedNodes.length > 0) {
                    var idAñadido = mutation.addedNodes[0].getAttribute("data-id");
                    var valIniciales = $("#id_beneficiados_relacionados_aux").val().split(",");
                    console.log(valIniciales);
                    if($.inArray(idAñadido, valIniciales) >= 0){
                        $(mutation.addedNodes[0]).remove();
                    } else {
                        valIniciales.push(idAñadido);
                        $("#id_beneficiados_relacionados_aux").val(valIniciales);
                    }
                }
              });    
            });

            var configBeneficiados = { attributes: true, childList: true, characterData: true };

            observerBeneficiados.observe(document.querySelector('#beneficiados_relacionados .ac-input .ac-appender'), configBeneficiados);
        });
    </script>
@endsection

@section('cabecera')
    Servicios
@endsection

@section('contenedor')
<div class="row">
    <h4>Editar Servicio</h4>
</div>
<div class="row">
    @foreach($errors->all() as $error)
      <div class="red-text">{{$error}}</div>
    @endforeach
    <form id="form" method="post" action="{{url('/servicios/actualizar')}}" class="col s12" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!--{{csrf_field()}}-->
        <!--Editar nombres según BD -->
        <div class="row">
            <div class="input-field col s12 m5">
                <input id="id_usuario_captura" name="id_usuario_captura" 
                    value="{{$usuario_capturista->datosUsuario->nombre.' '.$usuario_capturista->datosUsuario->apellido_paterno.
                    ' '.$usuario_capturista->datosUsuario->apellido_materno}}"
                    type="text" class="validate" readonly>
                <label for="id_usuario_captura" class="active">Capturista</label>
            </div>
            <div class="input-field col s12 m5">
                <input id="id_orden_atencion" name="id_orden_atencion" type="text" class="validate"
                    value="{{$orden->id_orden_atencion}}" readonly="true">
                <label for="id_orden_atencion" class="active">Id. Orden</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m5">
                <select id="id_region" name="id_region" class="select-wrapper validate">
                    @foreach($regiones as $region)
                        <option value="{{$region->id_region}}" {{$orden->id_region == $region->id_region ? 'selected' : ''}}>{{$region->nombre}}</option>
                    @endforeach
                </select>
                <label for="id_region">Región responsable</label>
            </div>
            <div class="input-field col s12 m5">
                <select id="id_centro_poder_joven" name="id_centro_poder_joven" class="validate">
                    @foreach($centros as $centro)
                        <option value="{{$centro->id_centro_poder_joven}}" {{$orden->id_centro_poder_joven == $centro->id_centro_poder_joven ? 'selected' : ''}}>{{$centro->nombre}}</option>
                    @endforeach
                </select> 
                <label for="id_centro_poder_joven">Centro Poder Joven</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m5">
                <select id="id_area" name="id_area" class="validate">
                    @foreach($areas as $area)
                        <option value="{{$area->id}}" {{$orden->id_centro_poder_joven == $centro->id_centro_poder_joven ? 'selected' : ''}}>{{$area->nombre}}</option>
                    @endforeach
                </select>
                <label for="id_area">Área responsable</label>
            </div>
            <div class="input-field col s12 m5">
                <select id="tipo_servicio" name="tipo_servicio[]" class="validate" multiple>
                    @foreach($servicios as $servicio)
                        <option value="{{$servicio->id_servicio}}" {{in_array($servicio->id_servicio, $orden_servicios) ? 'selected' : ''}}>{{$servicio->titulo}}</option>
                    @endforeach
                </select>
                <label for="tipo_servicio">Tipo de servicios que brinda</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m5">
                <div class="autocomplete" id="usuario_responsable">
                    <div class="ac-input">
                        <input type="text" id="id_usuario_responsable_autocomplete"  placeholder="" data-activates="usuarioResponsableDropdown" data-beloworigin="true" value="{{$usuario_responsable->datosUsuario->nombre.' '.$usuario_responsable->datosUsuario->apellido_paterno.' '.$usuario_responsable->datosUsuario->apellido_materno}}" autocomplete="off">
                        
                    </div>
                    <ul id="usuarioResponsableDropdown" class="dropdown-content ac-dropdown"></ul>
                </div>
                <label class="active" for="id_usuario_responsable_autocomplete">Usuario responsable: </label>
            </div>
            <div class="input-field col s12 m5">
                <div class="autocomplete" id="joven_responsable">
                    <div class="ac-input">
                        <input type="text" id="id_joven_responsable_autocomplete"  placeholder="" data-activates="jovenResponsableDropdown" data-beloworigin="true" value="{{$joven_beneficiado->datosUsuario->nombre.' '.$joven_beneficiado->datosUsuario->apellido_paterno.' '.$joven_beneficiado->datosUsuario->apellido_materno}}" autocomplete="off">
                    </div>
                    <ul id="jovenResponsableDropdown" class="dropdown-content ac-dropdown"></ul>
                </div>
                <label class="active" for="id_joven_responsable_autocomplete">Joven beneficiado: </label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m9">
               <div class="autocomplete" id="usuarios_involucrados">
                   <div class="ac-input">
                       <div class="ac-users">
                            @foreach ($orden->involucrados as $involucrado)
                                <div class="chip" data-id="{{$involucrado->id}}" data-text="{{$involucrado->datosUsuario->nombre . " " . $involucrado->datosUsuario->apellido_paterno . " " . $involucrado->datosUsuario->apellido_materno}}">{{$involucrado->datosUsuario->nombre . " " . $involucrado->datosUsuario->apellido_paterno . " " . $involucrado->datosUsuario->apellido_materno}}({{$involucrado->id}})<i class="material-icons close">close</i></div>
                            @endforeach
                       </div>
                       <input type="text" id="id_usuarios_involucrados_autocomplete"  placeholder="" data-activates="usuariosInvolucradosDropdown" data-beloworigin="true" autocomplete="off">
                    </div>
                    <ul id="usuariosInvolucradosDropdown" class="dropdown-content ac-dropdown"></ul>

                    <?php
                        $ids = "";
                        foreach($orden->involucrados as $key => $usuario) {
                        if($key != 0){
                            $ids .= ",";
                        }
                        $ids .= $usuario->id;
                        }
                    ?>

                    <input class="validate" type="hidden" id="id_usuarios_involucrados_aux" name="id_usuarios_involucrados_aux" value="{{$ids}}">
                </div>
                <label class="active" for="id_usuarios_involucrados_autocomplete">Usuarios involucrados: </label>
            </div>
        </div>
        <!-- Editar-->
        <div class="row">
            <div class="input-field col s12 m9">
                <div class="autocomplete" id="beneficiados_relacionados">
                        <div class="ac-input">
                            <div class="ac-jovenes">
                                @foreach ($orden->beneficiados as $beneficiado)
                                    <div class="chip" data-id="{{$beneficiado->id}}" data-text="{{$beneficiado->datosUsuario->nombre . " " . $beneficiado->datosUsuario->apellido_paterno . " " . $beneficiado->datosUsuario->apellido_materno}}">{{$beneficiado->datosUsuario->nombre . " " . $beneficiado->datosUsuario->apellido_paterno . " " . $beneficiado->datosUsuario->apellido_materno}}({{$beneficiado->id}})<i class="material-icons close">close</i></div>
                                @endforeach
                            </div>
                            <input type="text" id="id_beneficiados_relacionados_autocomplete"  placeholder="" data-activates="jovenesInvolucradosDropdown" data-beloworigin="true" autocomplete="off">
                        </div>
                        <ul id="jovenesInvolucradosDropdown" class="dropdown-content ac-dropdown"></ul>
                    <?php
                        $ids = "";
                        foreach($orden->beneficiados as $key => $usuario) {
                        if($key != 0){
                            $ids .= ",";
                        }
                        $ids .= $usuario->id;
                        }
                    ?>

                    <input class="validate" type="hidden" id="id_beneficiados_relacionados_aux" name="id_beneficiados_relacionados_aux" value="{{$ids}}">
                </div>
                <label class="active" for="id_beneficiados_relacionados_autocomplete">Jóvenes beneficiados: </label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m9">
                <input id="titulo" name="titulo" type="text" value="{{$orden->titulo}}" class="validate">
                <label for="titulo" class="active">Título de orden de servicio</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m9">
                <textarea id="descripcion" name="descripcion" class="materialize-textarea">{{$orden->descripcion}}</textarea>
                <label for="descripcion" class="active">Descripción de orden de servicio</label>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m3">
                <label for="fecha_inicio" class="active">Fecha de inicio</label>
                <input name="fecha_inicio" id="fecha_inicio" value="{{explode(' ',$orden->fecha_inicio)[0]}}" type="text" class="datepicker">
            </div>
            <div class="col s12 m3">
                <label for="fecha_propuesta" class="active">Fecha propuesta</label>
                <input name="fecha_propuesta" id="fecha_propuesta" value="{{explode(' ',$orden->fecha_propuesta)[0]}}" type="text" class="datepicker">
            </div>
            <div class="col s12 m3">
                <label for="fecha_resolucion" class="active">Fecha de resolución</label>
                <input name="fecha_resolucion" id="fecha_resolucion" value="{{explode(' ',$orden->fecha_resolucion)[0]}}" type="text" class="datepicker">
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m9">
                <textarea id="observaciones" name="observaciones" class="materialize-textarea">{{$orden->observaciones}}</textarea>
                <label for="observaciones" class="active">Observaciones</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m5">
                <input id="costo_estimado" name="costo_estimado" value="{{$orden->costo_estimado}}" type="text" class="validate">
                <label for="costo_estimado" class="active">Costo estimado</label>
            </div>
            <div class="input-field col s12 m5">
                <input id="costo_real" name="costo_real" type="text" value="{{$orden->costo_real}}" class="validate">
                <label for="costo_real" class="active">Costo real</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m5">
                <input id="resultado" name="resultado" type="text" value="{{$orden->resultado}}" class="validate">
                <label for="resultado" class="active">Resultado</label>
            </div>
            <div class="input-field col s12 m5">
                <select id="estatus" name="estatus" class="validate">
                    @foreach($estatus_orden as $estatus)
                        <option value="{{$estatus->id}}" {{($orden->estatus == $estatus->id) ? 'selected' : ''}}>{{$estatus->nombre}}</option>
                    @endforeach
                </select>
                <label for="estatus">Estatus</label>
            </div>
        </div>

        <div class="row">
            <button type="submit" class="s12 m12 waves-effect waves-light btn rose-code accent-color" id="guardar">
                Guardar
            </button>
        </div>
    </form>
</div>

@endsection


