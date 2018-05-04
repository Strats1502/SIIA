@extends('layout.app')

@section('title')
    {{$escuela->nombre}}
@endsection

@section('cabecera')
    Editar escuela
@endsection

@section('head')
    <script type="text/javascript" src="{{url('/js/jquery.validate.js')}}"></script>
    <script src="{{url('/js/convocatorias/editar.js')}}"></script>
@endsection

@section('contenedor')

    <!--Modal eliminar-->
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
    <form id="form-editar" method="post" action="{{url('/escuelas/editar')}}" class="col s12" enctype="multipart/form-data">
    <div class="row">
        <h2>{{$escuela->nombre}}</h2>
        <div class="s12 center-align">
        <img id="img-escuela" src="{{$escuela->ruta_imagen}}" height="200" alt=""></div>
        <div class="file-field input-field col s12 l6 offset-l3">
            <div class="btn accent-color">
                <span>Imagen</span>
                <input type="file" id="imagen" name="imagen" >
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" value="{{$escuela->ruta_imagen}}" placeholder="Cambiar imagen">
            </div>
        </div>
    </div>
    <div class="row">

        @foreach($errors->all() as $error)
            <div class="red-text">{{$error}}</div>
        @endforeach


            {{csrf_field()}}
            <input type="hidden" name="input-deleted-docs" id="input-deleted-docs" value="[]">
            <input type="hidden" name="id" value="{{$escuela->id}}">
            <div class="row">
                <div class="input-field col s12">
                    <input id="nombre" name="nombre" type="text" value="{{$escuela->nombre}}" class="validate">
                    <label for="titulo">Nombre</label>
                </div>

            </div>
            <input class="input-field btn right primary-color" type="submit" value="Actualizar">



    </div>
    </form>
@endsection
