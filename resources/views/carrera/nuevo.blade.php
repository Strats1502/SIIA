@extends('layout.app')

@section('title')
    Nueva carrera
@endsection


@section('head')
    <script type="text/javascript" src="{{url('/js/jquery.validate.js')}}"></script>
    <script src="{{url('/js/usuarios/nuevo.js')}}"></script>
@endsection

@section('contenedor')
    <div class="row">
        <h2>Nueva carrera</h2>
    </div>
    <div class="row">
        @foreach($errors->all() as $error)
            <div class="red-text">{{$error}}</div>
        @endforeach
        <form id="form-crear" method="post" action="{{url('/carreras/crear')}}" class="col s12"
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

                <div class="input-field col s12 ">
                    <input  id="abreviatura" name="abreviatura" type="text" maxlength="4">
                    <label for="abreviatura">Abreviatura</label>
                </div>

                <div class="input-field col s12 ">
                    <input  id="estructura_generica_creditos" name="estructura_generica_creditos" type="number">
                    <label for="estructura_generica_creditos">Estructura génerica créditos</label>
                </div>

                <div class="input-field col s12 ">
                    <input  id="residencia_profesional_creditos" name="residencia_profesional_creditos" type="number">
                    <label for="residencia_profesional_creditos">Residencia profesional créditos</label>
                </div>

                <div class="input-field col s12 ">
                    <input  id="servicio_social_creditos" name="servicio_social_creditos" type="number">
                    <label for="servicio_social_creditos">Servicio social créditos</label>
                </div>

                <div class="input-field col s12 ">
                    <input  id="actividades_complementarias_creditos" name="actividades_complementarias_creditos" type="number">
                    <label for="actividades_complementarias_creditos">Actividades complementarias créditos</label>
                </div>

            </div>

                <div class="col s12">
                <input class="input-field btn right accent-color" type="submit" value="Registrar">
</div>
            </div>
        </form>
    </div>

@endsection