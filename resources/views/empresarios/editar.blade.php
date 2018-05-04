@extends('layout.app')

@section('title')
    Empresario
@endsection

@section('head')
    <script type="text/javascript" src="{{url('/js/empresario/editar.js')}}"></script>
@endsection

@section('cabecera')
    Empresarios
@endsection


@section('contenedor')

    <ul id="tabs-swipe-demo" class="tabs">
      <li class="tab col s3"><a style="color: {{trans('strignore.colores.accent-color')}};" class="active" href="#div-editar">Información</a></li>
      <li class="tab col s3"><a style="color: {{trans('strignore.colores.accent-color')}};" href="#div-documentos">Documentos</a></li>
      <li class="tab col s3"><a style="color: {{trans('strignore.colores.accent-color')}};" href="#div-entregables">Entregables</a></li>
    </ul>

    <div class="row" id="div-editar">
      @foreach($errors->all() as $error)
          <div class="red-text">{{$error}}</div>
      @endforeach

      <form id="form-nj" method="post" action="{{url('/empresarios/editar')}}" class="col s12" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="idUsuario" value="{{$usuario->id}}">
        <div class="row">
          
          <div style="display:inline-block;" class="col s4 m3">
            <div class="col s12 m7">
              <img id="image" class="circle" src="{{$datosUsuario->ruta_imagen}}" height="180" width="180"></img>
            </div>

            <div class="input-field col s12 m6">
              <div class="file-field input-field col s12 m7">
                <div class="btn accent-color">
                  <span center-align>Imagen</span>
                  <input type="file" id="ruta_imagen" name="ruta_imagen" onchange="readURL(this)">
                </div>
                <!--<div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Agrega una imagen">
                </div>-->
              </div>
            </div>
          </div>

          <div style="display:inline-block;" class="col s8 m9">
            <img src="{{ url('img/grafica.png') }}" style="padding:15px;width:900px; height:400px"/>
          </div>

          <div class="input-field col s4">
            <input id="nombre" name="nombre" type="text" class="validate" value="{{$datosUsuario->nombre}}" readonly>
            <label for="nombre">Nombre(s)</label>
          </div>
          <div class="input-field col s4">
            <input id="apellido_paterno" name="apellido_paterno" type="text" class="validate" value="{{$datosUsuario->apellido_paterno}}" readonly>
            <label for="apellido_paterno">Apellido Paterno</label>
          </div>
          <div class="input-field col s4">
            <input id="apellido_materno" name="apellido_materno" type="text" class="validate" value="{{$datosUsuario->apellido_materno}}" readonly>
            <label for="apellido_materno">Apellido Materno</label>
          </div>

          <div class="input-field col s4">
            <input id="email" name="email" type="email" class="validate" value="{{$usuario->email}}">
            <label for="email">Correo electrónico</label>
          </div>

          
          <div class="input-field col s4">
            <input id="curp" name="curp" type="text" class="validate" value="{{$datosUsuario->curp}}" readonly>
            <label for="curp">CURP</label>
          </div>
          
          <div class="input-field col s4">
            <input id="codigo_postal" name="codigo_postal" type="text" class="validate" value="{{$datosUsuario->codigo_postal}}">
            <label for="codigo_postal">Código Postal</label>
          </div>

          <div class="col s6">
            <label>Género</label>
            <select  id="id_genero" name="genero" disabled>
              @foreach($generos as $genero)
                <option value="{{$datosUsuario->genero->abreviatura}}">{{$datosUsuario->genero->nombre}}</option>
              @endforeach
            </select>
          </div>

          <div class="col s6">
            <label>Nivel de Estudios</label>
            <select  id="id_nivel_estudios" name="id_nivel_estudios" >
              @foreach($niveles_estudio as $nivel_estudio)
                <option value="{{$nivel_estudio->id_nivel_estudios}}" {{$datosUsuario->id_nivel_estudios == $nivel_estudio->id_nivel_estudios ? 'selected' : ''}}>{{$nivel_estudio->nombre}}</option>
              @endforeach 
            </select>
          </div>

          <div class="col s6">
            <label>Estado de Nacimiento</label>
            <select  id="id_estado_nacimiento" name="estado_nacimiento" disabled >
              @foreach($estados as $estado)
                <option value="{{$estado->abreviatura}}">{{$datosUsuario->estado->nombre}}</option>
              @endforeach
            </select>
          </div>
          
          <!--<div class="divider" style="width: 100%;"></div>
          <br><br>-->
          <div class="col s6">
            <label>Estado donde radica</label>
            <select  id="id_estado" name="id_estado" >
              @foreach($estados as $estado)
                <option value="{{$estado->id_estado}}" {{$datosUsuario->id_estado == $estado->id_estado ? 'selected' : ''}}>{{$estado->nombre}}</option>
              @endforeach
            </select>
          </div>


          <div class="col s12">
            <label>¿Eres originario de algún pueblo o comunidad indígena?</label>
            <select  name="pueblo" id="pueblo">
              <option value="0" {{isset($datosUsuario->id_pueblo_indigena)  ? "" : 'selected'}}>No</option>
              <option value="1" {{isset($datosUsuario->id_pueblo_indigena)  ? 'selected' : ""}}>Sí</option>
            </select>
          </div>
          <div class="col s12" id="tipo-pueblo" style="display: {{isset($datosUsuario->id_pueblo_indigena)  ? 'block' : 'none'}}">
            <label>¿De cuál?</label>
            <select  name="id_pueblo_indigena" id="id_pueblo_indigena">
              <option value="">Selecciona</option>
              @foreach ($pueblos_indigena as $pueblo_indigena)
                <option value="{{$pueblo_indigena->id_pueblo_indigena}}" {{$datosUsuario->id_pueblo_indigena == $pueblo_indigena->id_pueblo_indigena ? 'selected' : ''}}>{{$pueblo_indigena->nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="col s12">
            <label>¿Presentas alguna capacidad diferente?</label>
            <select  id="capacidad" name="capacidad" >
              <option value="0" {{isset($datosUsuario->id_capacidad_diferente) ? "" : 'selected'}}>No</option>
              <option value="1" {{isset($datosUsuario->id_capacidad_diferente) ? 'selected' : ""}}>Sí</option>
            </select>
          </div>
          <div class="col s12" id="tipo-capacidad" style="display: {{isset($datosUsuario->id_capacidad_diferente)  ? 'block' : 'none'}}">
            <label>¿De qué tipo?</label>
            <select  name="id_capacidad_diferente" id="id_capacidad_diferente">
              <option value="">Selecciona</option>
              @foreach ($capacidades_diferente as $capacidad_diferente)
                <option value="{{$capacidad_diferente->id_capacidad_diferente}}" {{$datosUsuario->id_capacidad_diferente == $capacidad_diferente->id_capacidad_diferente ? 'selected' : ''}}>{{$capacidad_diferente->nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="col s12">
            <label>¿Has obtenido premios o distinciones?</label>
            <select  name="premio" id="premio">
              <option value="" {{isset($datosUsuario->premios) ? "" : 'selected'}}>No</option>
              <option value="1" {{isset($datosUsuario->premios) ? 'selected' : ""}}>Sí</option>
            </select>
          </div>
          <div class="input-field col s12" id="tipo-premios" style="display: {{isset($datosUsuario->premios)  ? 'block' : 'none'}}">
            <input id="premios" name="premios" type="text" class="validate" value="{{$datosUsuario->premios}}">
            <label for="premios">Menciona cuál(es)</label>
          </div>
          <div class="col s12">
            <label>¿Participas en algún proyecto social que beneficie a tu comunidad?</label>
            <select  name="proyecto" id="proyecto">
              <option value="" {{isset($datosUsuario->proyectos_sociales) ? "" : 'selected'}}>No</option>
              <option value="1" {{isset($datosUsuario->proyectos_sociales) ? 'selected' : ""}}>Sí</option>
            </select>
          </div>
          <div class="input-field col s12" id="proyectos" style="display: {{isset($datosUsuario->proyectos_sociales)  ? 'block' : 'none'}}">
            <input id="proyectos_sociales" name="proyectos_sociales" type="text" class="validate" value="{{$datosUsuario->proyectos_sociales}}">
            <label for="proyectos_sociales">Menciona cuál(es)</label>
          </div>
          <div class="col s12" id="economico" style="display: {{isset($datosUsuario->apoyo_proyectos_sociales)  ? 'block' : 'none'}}">
            <label>¿Recibes sueldo o apoyo económico por esto?</label>
            <select  id="apoyo_proyectos_sociales" name="apoyo_proyectos_sociales">
              <option value="0"{{$datosUsuario->apoyo_proyectos_sociales == 0 ? 'selected' : ''}}>No</option>
              <option value="1"{{$datosUsuario->apoyo_proyectos_sociales == 1 ? 'selected' : ''}}>Sí</option>
            </select>
          </div>
          <div class="col s12">
            <label>¿Trabajas?</label>
            <select  id="trabaja" name="trabaja">
              <option value="0" {{$datosUsuario->trabaja == 0 ? 'selected' : ''}}>No</option>
              <option value="1" {{$datosUsuario->trabaja == 1 ? 'selected' : ''}}>Sí</option>
            </select>
          </div>
          <div class="col s12">
            <label>¿Eres beneficiario de algún programa de gobierno?</label>
            <select  id="programa" name="programa">
              <option value="" {{isset($datosUsuario->id_programa_beneficiario)  ? "" : 'selected'}}>No</option>
              <option value="1" {{isset($datosUsuario->id_programa_beneficiario)  ? 'selected' : ""}}>Sí</option>
            </select>
          </div>
          <div class="col s12" id="tipo-programa" style="display: {{isset($datosUsuario->id_programa_beneficiario)  ? 'block' : 'none'}}">
            <label>¿De qué tipo?</label>
            <select  name="id_programa_beneficiario" id="id_programa_beneficiario">
              <option value="">Selecciona</option>
              @foreach($programas_gobierno as $programa_gobierno)
                <option value="{{$programa_gobierno->id_programa_gobierno}}" {{$datosUsuario->id_programa_beneficiario == $programa_gobierno->id_programa_gobierno ? 'selected' : ''}}>{{$programa_gobierno->nombre}}</option>
              @endforeach    
            </select>
          </div>
        </div>
        <!--................    Idiomas     ................ -->
        <div class="row row-general">
          <h5>Idioma(s)</h5>
          @if (count($datosUsuario->idiomasAdicionales) > 0)
            @foreach($datosUsuario->idiomasAdicionales as $idiomaAdicional)
              <div class="row row-idioma">  

                <div class="col s4">
                  <label>Selecciona el idioma</label>
                  <select  name="idioma[]" id="idioma">
                    <option value="">Selecciona</option>
                    @foreach($idiomas as $idioma)
                      <option value="{{$idioma->id_idioma_adicional}}" {{$idiomaAdicional->id_idioma_adicional == $idioma->id_idioma_adicional ? 'selected' : ''}}>{{$idioma->nombre}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="input-field col s2" id="conversacion">
                  <input id="conversacion-input" name="conversacion[]" type="number" min="0" max="100" class="validate"  value="{{$idiomaAdicional->pivot->conversacion}}">
                  <label for="conversacion">Conversación</label>
                </div>

                <div class="input-field col s2" id="lectura">
                  <input id="lectura-input" name="lectura[]" type="number" min="0" max="100" class="validate" value="{{$idiomaAdicional->pivot->lectura}}">
                  <label for="lectura">Lectura</label>
                </div>

                <div class="input-field col s2" id="escritura">
                  <input id="escritura-input" name="escritura[]" type="number" min="0" max="100" class="validate" value="{{$idiomaAdicional->pivot->escritura}}">
                  <label for="escritura">Escritura</label>
                </div>

                <div class="col s2" style="text-align: right;">
                  <i class="material-icons grey-text borrar-idioma" style="cursor: pointer">delete</i>   
                </div>

              </div>
            @endforeach
          @else
            <div class="row row-idioma">  
              <div class="col s4">
                <select  name="idioma[]" id="idioma">
                  <option value="">Selecciona</option>
                  @foreach($idiomas as $idioma)
                    <option value="{{$idioma->id_idioma_adicional}}">{{$idioma->nombre}}</option>
                  @endforeach
                </select>
              </div>
              <div class="input-field col s2" id="conversacion">
                <input id="conversacion-input" name="conversacion[]" type="number" min="0" max="100" class="validate">
                <label for="conversacion">Conversación</label>
              </div>
              <div class="input-field col s2" id="lectura">
                <input id="lectura-input" name="lectura[]" type="number" min="0" max="100" class="validate">
                <label for="lectura">Lectura</label>
              </div>
              <div class="input-field col s2" id="escritura">
                <input id="escritura-input" name="escritura[]" type="number" min="0" max="100" class="validate">
                <label for="escritura">Escritura</label>
              </div>
              <div class="col s2" >
                <i class="material-icons grey-text borrar-idioma " style="cursor: pointer">delete</i>   
              </div>
            </div>
          @endif
        </div>
        <a class="btn-floating idiomabtn"><i class="material-icons accent-color" >add</i></a>
        <div class="row">
          <div class="col offset-s5">
            <input type="submit" class="input-field btn accent-color" value="Actualizar">
          </div>
        </div>
      </form>
    </div>

    <div class="row" id="div-documentos">
      <div class="section" id="doc-container">
                        @foreach($documentos as $documento)

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
    </div>

    <div class="row" id="div-entregables">
    <div class="section" id="doc-container">
                        @foreach($documentos as $documento)

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
    </div>

@endsection
