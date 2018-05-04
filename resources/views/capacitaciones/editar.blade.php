@extends('layout.app')

@section('title')
    Editar capacitación
@endsection

@section('cabecera')
    Capacitación
@endsection

@section('head')
    <script type="text/javascript" src="{{url('/js/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{url('/js/capacitaciones/editar.js')}}"></script>
    <script>
        var primaryColor = "{{trans('strignore.colores.accent-color')}}";
    </script>
@endsection

@section('contenedor')
    <!-- Editar temas -->
    <div class="row">
        <h4>{{trans('str.capacitaciones.titulo')}}</h4>
    </div>
    @foreach($errors->all() as $error)
        <div class="red-text">{{$error}}</div>
    @endforeach
        
    <ul class="tabs">
        <li class="tab col s3"><a style="color: {{trans('strignore.colores.accent-color')}};" class="active" href="#temas">{{trans('str.capacitaciones.pestana1')}}</a></li>
        <li class="tab col s3"><a style="color: {{trans('strignore.colores.accent-color')}};" href="#capacitacion">{{trans('str.capacitaciones.pestana2')}}</a></li>
    </ul>
    <div id="capacitacion">
        <div class="row">
            @include('capacitaciones.nuevaForm')
        </div>
    </div>
    
    <div id="temas">
        @if(isset($capacitacion->temas[0]))
            @foreach($capacitacion->temas as $tema)
                <table style="margin-top: 30px;" class="highlight">
                    <thead>
                        <tr>
                            <th style="cursor: pointer;" class="editar-tema tooltipped" data-tema-id="{{$tema->id}}" data-position="top" data-tooltip="{{trans('str.capacitaciones.modifyTopic')}}"> <img style="width: 30px; height: 30px; border-radius: 50%;" src="{{$tema->ruta_imagen}}" alt="{{$tema->titulo}}"> {{$tema->titulo}}</th>
                            <td style="width: 25px; cursor: pointer;">
                                <i data-tema-id="{{$tema->id}}" class="material-icons agregar-documento tooltipped" data-position="top" data-tooltip="{{trans('str.capacitaciones.addDocument')}}">insert_drive_file</i>
                                <div class="oculto" data-tema-id="{{$tema->id}}">
                                    <input type="hidden" name="titulo" id="titulo" value="{{$tema->titulo}}">
                                    <input type="hidden" name="ruta_imagen" id="ruta_imagen" value="{{$tema->ruta_imagen}}">
                                </div>
                            </td>
                            <td style="width: 25px; cursor: pointer;"><i data-tema-id="{{$tema->id}}" class="material-icons agregar-video tooltipped" data-position="top" data-tooltip="{{trans('str.capacitaciones.addVideo')}}">video_library</i></td>
                            <td style="width: 100px; cursor: pointer;"><i data-elemento-id="{{$tema->quiz->id}}" class="material-icons editar-quiz tooltipped" data-position="top" data-tooltip="{{trans('str.capacitaciones.modifyQuiz')}}">list</i></td>
                            <td style="width: 15px; cursor: pointer;"><i class="small material-icons borrar-tema tooltipped" data-position="top" data-tooltip="{{trans('str.capacitaciones.deleteTopic')}}" data-tema-id="{{$tema->id}}">delete</i></td>
                        </tr>
                    </thead>
                    @foreach($tema->videos as $video)
                        <tr>
                            <td style="display:block; margin-left:20px; cursor: pointer;" class="editar-video" data-video-id="{{$video->id}}"><i style="font-size: 1.3rem" class="material-icons">play_circle_filled</i> {{$video->titulo}}</td>
                            <td>
                                <div style="display: none" data-video-id="{{$video->id}}">
                                    <input type="hidden" value="{{$video->video_link}}" id="video_link_hidden">
                                    <input type="hidden" value="{{$video->ruta_imagen}}" id="video_imagen_hidden">
                                    <input type="hidden" value="{{$video->titulo}}" id="video_titulo_hidden">
                                    <input type="hidden" value="{{$video->descripcion}}" id="video_descripcion_hidden">
                                    <input type="hidden" value="{{$video->identificador}}" id="video_identificador_hidden">
                                    <input type="hidden" value="{{$video->duracion}}" id="video_duracion_hidden">
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td style="cursor: pointer;"><i data-tipo="video" data-tema-id="{{$tema->id}}" data-elemento-id="{{$video->id}}" class="material-icons borrar-elemento tooltipped" data-position="left" data-tooltip="{{trans('str.capacitaciones.deleteVideo')}}">delete</i></td>
                        </tr>
                    @endforeach
                    @foreach($tema->documentos as $documento)
                        <tr>
                            <td style="display:block; margin-left:20px;"><i style="font-size: 1.3rem" class="material-icons">insert_drive_file</i> {{$documento->titulo}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="cursor: pointer;"><i data-tipo="documento" data-elemento-id="{{$documento->id}}" class="material-icons borrar-elemento tooltipped" data-position="left" data-tooltip="{{trans('str.capacitaciones.deleteDocument')}}">delete</i></td>
                        </tr>
                    @endforeach
                    @if(isset($tema->quiz))
                        <tr>
                            <td style="display:block; margin-left:20px; cursor: pointer;" class="editar-quiz" data-elemento-id="{{$tema->quiz->id}}"><i style="font-size: 1.3rem" class="material-icons">question_answer</i> {{$tema->quiz['titulo']}}</td>
                            <td>
                                <div style="display: block" data-quiz-id="{{$tema->quiz->id}}">
                                    <input type="hidden" class="quiz-titulo" value="{{$tema->quiz->titulo}}">
                                    @foreach($tema->quiz->preguntas as $pregunta)
                                        <div class="pregunta">
                                            <input type="hidden" class="pregunta-id" value="{{$pregunta->id}}">
                                            <input type="hidden" class="pregunta-texto" value="{{$pregunta->texto}}">
                                            @foreach($pregunta->opciones as $opcion)
                                                <div class="opcion">
                                                    <input type="hidden" class="opcion-id" value="{{$opcion->id}}">
                                                    <input type="hidden" class="opcion-correcta" value="{{$opcion->correcta}}">
                                                    <input type="hidden" class="opcion-texto" value="{{$opcion->texto}}">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                </table>
            @endforeach
        @else
            <p class="center">{{trans('str.capacitaciones.noTopics')}}</p>
            <!-- <script>
                //Abre el modal para agrear un tema.
                $(function(){ $("#modal-nuevo-tema").openModal(); });
            </script> -->
        @endif

        <div class="col s1">
            <div class="fixed-action-btn">
                <a class="btn-floating btn-large waves-effect waves-light nuevo-tema accent-color" href="#"><i class="material-icons">add</i></a>
            </div>
        </div>
    </div>
    
<!-- ..........................................Modals.................................... -->

    <div class="modal-container">
        <div id="modal-nuevo-tema" style="width: 70%; top:40% !important;" class="modal">
            <form id="form-nuevo-tema" action="{{url('/capacitaciones/nuevo-tema')}}" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <h3>Nuevo tema</h3>
                    <img id="imagen-nuevo-tema" src="" alt="" style="display: block; margin: auto; width: 20%; border-radius: 8px;">
                    <div class="file-field input-field">
                        <div class="btn accent-color" style="background: #B60000">
                            <span>Imagen</span>
                            <input type="file" name="ruta_imagen" id="ruta_imagen" class="validate">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path type="text">
                        </div>
                    </div>
                    <div class="input-field">
                        <input id="tema_titulo" name="tema_titulo" type="text" class="validate">
                        <label for="tema_titulo">Título</label>
                    </div>
                    <input type="hidden" name="capacitacion" value="{{$capacitacion->id}}">
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                </div>
                <div class="modal-footer">
                    <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancelar</a>
                    <input type="submit" href="#" class="waves-effect waves-green btn-flat"  value="Agregar" id="yesBtn"/>
                </div>
            </form>
        </div>
    </div>

    <div class="modal-container">
        <div id="modal-nuevo-documento"  class="modal">
            <form id="form-nuevo-documento" action="{{url('/capacitaciones/nuevo-documento')}}" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <h3>{{trans('str.capacitaciones.addDocument')}}</h3>
                    <div class="file-field input-field">
                        <div class="btn accent-color">
                            <span>{{trans('str.capacitaciones.document')}}</span>
                            <input type="file" id="documento" name="documento" class="validate">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" name="titulo" id="titulo">
                        </div>
                    </div>
                    <input type="hidden" name="tema-id" id="tema-id">
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                </div>
                <div class="modal-footer">
                    <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">{{trans('str.capacitaciones.cancel')}}</a>
                    <input type="submit" href="#" class="waves-effect waves-green btn-flat"  value="Agregar" id="yesBtn"/>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-nuevo-video"  class="modal">
        <form action="{{url('/capacitaciones/agregar-video')}}" id="form-agregar-video" method="post">
            <div class="modal-content">
                <div class="row">
                    <h3>{{trans('str.capacitaciones.addVideo')}}</h3>
                </div>
                <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                <input type="hidden" name="tema-id" id="tema-id">
                <div class="row">
                    <div class="input-field">
                        <input class="link_cargado" id="link_cargado" name="link_cargado" type="text">
                        <label for="link_cargado">{{trans('str.capacitaciones.videoLink')}}</label>
                    </div>
                </div>

                <div class="videoItem">
                    <div class="row">
                        <div class="image col s3" style="max-width: 300px; display: none;"><img width="95%" src="" alt=""></div>
                        <div class="inputs col s9">
                            <div class="input-field" id="video-titulo-div">
                                <input id="video_titulo" name="video_titulo[0]" type="text" data-msg-required="Este campo es obligatorio" required>
                                <label for="video_titulo">{{trans('str.capacitaciones.labelTittle')}}</label>
                            </div>

                            <div class="input-field">
                                <textarea id="video_descripcion" name="video_descripcion[0]" class="materialize-textarea" data-msg-required="Este campo es obligatorio" required></textarea>
                                <label class="active" for="video_descripcion">{{trans('str.capacitaciones.description')}}</label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="ruta_imagen[0]" id="ruta_imagen">
                    <input type="hidden" name="identificador[0]" id="identificador" required>
                    <input type="hidden" name="video_link[0]" id="video_link" required>
                    <input type="hidden" name="duracion[]" id="duracion">
                    <div class="divider"></div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">{{trans('str.capacitaciones.cancel')}}</a>
                <input type="submit" href="#" class="waves-effect waves-green btn-flat"  value="Agregar" id="yesBtn"/>
            </div>
        </form>
    </div>
    
    <div class="modal-container">
        <div id="modal-borrar-tema" class="modal">
            <form action="{{url('/capacitaciones/editar/eliminar-tema')}}" method="post">
                <div class="modal-content">
                    <h4>{{trans('str.capacitaciones.confirm')}}</h4>
                    <p id="delete-message">{{trans('str.capacitaciones.deleteTopicMessage')}}</p>
                    <input type="hidden" name="id_tema" id="id_tema">
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                </div>
                <div class="modal-footer">
                    <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">{{trans('str.capacitaciones.cancel')}}</a>
                    <input type="submit" href="#" class="waves-effect waves-green btn-flat"  value="Sí" id="yesBtn"/>
                </div>
            </form>
        </div>
    </div>

    <div class="modal-container">
        <div id="modal-borrar-elemento" class="modal">
            <form action="{{url('/capacitaciones/editar/')}}" method="post">
                <div class="modal-content">
                    <h4>{{trans('str.capacitaciones.confirm')}}</h4>
                    <p id="delete-message">{{trans('str.capacitaciones.deleteElementMessage')}}</p>
                    <input type="hidden" name="id_elemento" id="id_elemento">
                    <input type="hidden" name="tipo_elemento" id="tipo_elemento">
                    <input type="hidden" name="id_capacitacion" id="id_capacitacion" value="{{$capacitacion->id}}">
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                </div>
                <div class="modal-footer">
                    <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">{{trans('str.capacitaciones.cancel')}}</a>
                    <input type="submit" href="#" class="waves-effect waves-green btn-flat"  value="Sí" id="yesBtn"/>
                </div>
            </form>
        </div>
    </div>

    <div class="modal-container">
        <div id="modal-editar-video" class="modal">
            <form action="{{url('/capacitaciones/editar/actualizar-video')}}" method="post" id="form-editar-video">
                <div class="modal-content">
                    <h3>{{trans('str.capacitaciones.modifyVideo')}}</h3>
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">

                    <div class="input-field">
                        <input type="text" name="link_cargado" id="link_cargado">
                        <label for="link_cargado">{{trans('str.capacitaciones.videoLink')}}</label>
                    </div>
                    <div class="videoItem">
                        <div class="row">
                            <div class="image col s3" style="max-width: 300px;"><img width="95%" src="" alt=""></div>
                            <div class="inputs col s9">
                                <div class="input-field" id="video-titulo-div">
                                    <input id="video_titulo" name="video_titulo" type="text" data-msg-required="Este campo es obligatorio" required>
                                    <label for="video_titulo">{{trans('str.capacitaciones.labelTittle')}}</label>
                                </div>

                                <div class="input-field">
                                    <textarea id="video_descripcion" name="video_descripcion" class="materialize-textarea" data-msg-required="Este campo es obligatorio" required></textarea>
                                    <label class="active" for="video_descripcion">{{trans('str.capacitaciones.description')}}</label>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="ruta_imagen" id="ruta_imagen">
                        <input type="hidden" name="video_link" id="video_link" required>
                        <input type="hidden" name="id_capacitacion" id="id_capacitacion" value="{{$capacitacion->id}}">
                        <input type="hidden" name="identificador" id="identificador" required>
                        <input type="hidden" name="id" id="id" required>
                        <input type="hidden" name="duracion" id="duracion">
                        <div class="divider"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">{{trans('str.capacitaciones.cancel')}}</a>
                    <input type="submit" href="#" class="waves-effect waves-green btn-flat"  value="{{trans('str.capacitaciones.save')}}" id="yesBtn"/>
                </div>
            </form>
        </div>
    </div>
    
    <div class="modal-container">
        <div class="modal" id="modal-editar-tema">
            <form action="{{url('/capacitaciones/editar/actualizar-tema')}}" id="form-editar-tema" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="row">
                        <h3>{{trans('str.capacitaciones.modifyTopic')}}</h3>
                    </div>
                        <div class="row">
                            <img src="" id="imagen-editar-tema" alt="" style="width: 30%; border-radius: 5px; display: block; margin: auto;">
                        </div>
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn accent-color">
                                <span>{{trans('str.capacitaciones.image')}}</span>
                                <input type="file" name="ruta_imagen" id="ruta_imagen" class="imagenes">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <input id="tema_titulo" name="tema_titulo" type="text" class="validate">
                            <label for="tema_titulo">{{trans('str.capacitaciones.labelTittle')}}</label>
                        </div>
                    </div>
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="tema-id" id="tema-id">
                    <input type="hidden" name="ruta_guardada" id="ruta_guardada" class="imagenes">
                </div>
                <div class="modal-footer">
                    <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">{{trans('str.capacitaciones.cancel')}}</a>
                    <input type="submit" href="#" class="waves-effect waves-green btn-flat"  value="Agregar" id="yesBtn"/>
                </div>
            </form>
        </div>
    </div>
    
    <div class="modal-container">
        <div class="modal" id="modal-editar-quiz">
            <form action="{{url('/capacitaciones/editar/actualizar-quiz')}}" method="post" id="form-editar-quiz">
                <div class="modal-content">
                    <div class="row">
                        <h3>{{trans('str.capacitaciones.modifyQuiz')}}</h3>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <input type="hidden" name="id-capacitacion" id="id-capacitacion" value="{{$capacitacion->id}}">
                            <input  type="hidden" name="quiz-id" id="quiz-id">
                            <input  type="text" name="quiz-titulo" id="quiz-titulo" data-msg-required="Este campo es obligatorio" required>
                            <label for="quiz-titulo">{{trans('str.capacitaciones.labelTittle')}}</label>
                        </div>
                    </div>
                        <div class="divider"></div>
                        <div id="preguntas">
                            
                        </div>
                    <a class="btn waves-effect waves-light agregar-pregunta accent-color" style="margin-top: 40px;" href="#"><i class="material-icons">add</i></a>
                    <input type="hidden" name="preguntasBorradas" id="preguntasBorradas">
                    <input type="hidden" name="opcionesBorradas" id="opcionesBorradas">
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                </div>
                <div class="modal-footer">
                    <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">{{trans('str.capacitaciones.cancel')}}</a>
                    <input type="submit" href="#" class="waves-effect waves-green btn-flat"  value="Listo" id="yesBtn"/>
                </div>
            </form>
        </div>
    </div>
@endsection
