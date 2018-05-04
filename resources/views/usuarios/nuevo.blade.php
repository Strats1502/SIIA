@extends('layout.app')

@section('title')
    Nuevo Usuario
@endsection


@section('head')
    <script type="text/javascript" src="{{url('/js/jquery.validate.js')}}"></script>
    <script src="{{url('/js/usuarios/nuevo.js')}}"></script>
@endsection

@section('contenedor')
    <div class="row">
        <h2>Nuevo Usuario</h2>
    </div>
    <div class="row">
        @foreach($errors->all() as $error)
            <div class="red-text">{{$error}}</div>
        @endforeach
        <form id="form-crear" method="post" action="{{url('/usuario/crear')}}" class="col s12"
              enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="row">

                <div class="input-field col s12 ">
                    <input  id="nombre" name="nombre" type="text" maxlength="50">
                    <label for="nombre">Nombre</label>
                </div>

                <div class="input-field col s12">
                    <input  id="apellido_paterno" name="apellido_paterno" type="text" maxlength="50">
                    <label for="apellido_paterno">Apellido Paterno</label>
                </div>

                <div class="input-field col s12">
                    <input  id="apellido_materno" name="apellido_materno" type="text" maxlength="50">
                    <label for="apellido_materno">Apellido Materno</label>
                </div>

                <div class="input-field col s12 ">
                    <input id="email" name="correo" type="email" class="validate" maxlength="50">
                    <label for="email">Correo electrónico</label>
                </div>

                <div class="input-field col s12">
                    <input id="password" name="password" type="password" class="validate" maxlength="50">
                    <label for="password">Contraseña</label>
                </div>

                <div class="row">
                <div class="input-field col s12">
                    <select required id="tipo-evento" name="tipo" class="validate">
                        <option value="" disabled>Elige una opción</option>
                             <option value="Administrador" selected>Administrador</option>
                             <option value="Maestro">Maestro</option>
                             <option value="Maestro">Alumno</option>
                    </select>
                    <label>Tipo</label>
                </div>
            </div>

                <div class="col s12">
                <input class="input-field btn right accent-color" type="submit" value="Registrar">
</div>
            </div>
        </form>
    </div>

@endsection
