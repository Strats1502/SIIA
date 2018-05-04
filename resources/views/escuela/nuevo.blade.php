@extends('layout.app')

@section('title')
    Nueva escuela
@endsection


@section('head')
    <script type="text/javascript" src="{{url('/js/jquery.validate.js')}}"></script>
    <script src="{{url('/js/usuarios/nuevo.js')}}"></script>
@endsection

@section('contenedor')
    <div class="row">
        <h2>Nueva escuela</h2>
    </div>
    <div class="row">
        @foreach($errors->all() as $error)
            <div class="red-text">{{$error}}</div>
        @endforeach
        <form id="form-crear" method="post" action="{{url('/escuelas/crear')}}" class="col s12"
              enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="row">

                <div class="btn accent-color">
                    <span>Imagen</span>
                    <input type="file" id="imagen" name="imagen" >
                </div>

                <div class="input-field col s12 ">
                    <input  id="nombre" name="nombre" type="text" maxlength="50">
                    <label for="nombre">Nombre</label>
                </div>

            </div>

                <div class="col s12">
                <input class="input-field btn right accent-color" type="submit" value="Registrar">
</div>
            </div>
        </form>
    </div>

@endsection