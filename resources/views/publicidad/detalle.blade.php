@extends('layout.app')

@section('title')
    Publicidad
@endsection

@section('cabecera')
    Publicidad
@endsection

@section('head')
    <script type="text/javascript" src="{{url('/js/pub/detalle.js')}}"></script>
    <script type="text/javascript" src="{{ url('/js/jquery.validate.js')}}"></script>
@endsection

@section('contenedor')
    <div class="row">
        <h5>Nueva publicidad</h5>
    </div>
    <form action="{{ url('/publicidad/createorupdate')}}" method="post" id="form-nuevo" enctype="multipart/form-data" >
    {{csrf_field()}}
    <div class="row">
            <div class="row">
                <div class="input-field col s12">
                    <input id="titulo" name="titulo" type="text" value="{{$publicidad ? $publicidad->titulo : ''}}" class="vald">
                    <label for="titulo">Título</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="descripcion" name="descripcion" value="{{$publicidad ? $publicidad->descripcion : ''}}" type="text" class="vald">
                    <label for="descripcion">Descripción</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="fecha-inicio" name="fecha-inicio" value="{{$publicidad ? $publicidad->fecha_inicio->format('m/d/Y') : ''}}" type="text" class="datepicker vald" >
                    <label for="fecha-inicio">Fecha de inicio</label>
                </div>
                <div class="input-field col s6">
                    <input id="fecha-fin" type="text" name="fecha-fin" value="{{$publicidad ? $publicidad->fecha_fin->format('m/d/Y') : ''}}" class="datepicker vald" >
                    <label for="fecha-fin">Fecha de fin</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="url" name="url" type="text" value="{{$publicidad ? $publicidad->url : ''}}" class="vald">
                    <label for="url">URL</label>
                </div>
            </div>
            <div class="row">
                @if($publicidad && $publicidad->ruta_imagen)
                    <img id="img_show"  height="500" src="{{$publicidad->ruta_imagen}}">
                @else
                    <img id="img_show">
                @endif
            </div>
            <div class="file-field input-field">
                <div class="btn rose-code accent-color">
                    <span>Imagen</span>
                    <input type="file" name="imagen" id="imagen" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Subir imagen">
                </div>
            </div>
        <input type="hidden" name="id_publicidad" id="id_publicidad" value="{{$publicidad ? $publicidad->id_publicidad : ''}}">
        <input type="hidden" name="field_imagen" id="field_imagen" value="{{$publicidad ? $publicidad->ruta_imagen : ''}}">
        <input class="input-field btn right accent-color" type="submit" value="Registrar">
    </div>
</form>
@endsection