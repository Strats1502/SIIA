<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="shortcut icon" type="image/png" href="{{ trans('str.login.icono') }}" />
    <link rel="stylesheet" href="{{url('css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="{{url('js/jquery-1.12.3.js')}}"></script>
    <script type="text/javascript" src="{{url('js/materialize.js')}}"></script>
</head> 
@extends('estilo.style')
<body class="valign-wrapper">

    

<div class="container">
@if ($errors->any())
		<script>
			@foreach($errors->all() as $error)	
                 Materialize.toast('{{$error }}', 2000)
			@endforeach
        </script>
	@endif
    <div class="row">
        <div class="col l6 m9 s12 offset-l3 offset-m2">
            <div class="card">
                <div class="card-image ">
                  <div style="position:absolute;width:100%;heig ht:100%;background-color: #ffffff26;z-index: 1;">
                  </div>
                  <img style="z-index:0;" src="{{trans('str.login.fondo')}}">

                    <span class="card-title">{{trans('str.login.titulo')}}</span>
                    <span class="card-title"><img style="margin-left:5px; margin-bottom: 50px; z-index:1; width:100px; height:100px" src="{{trans('str.login.icono')}}"></span>
                    @if(isset($errors))
                        @foreach($errors as $error)
                            <div class="col s12 red" style="height:30px; padding-top:5px;">
                                <span class="white-text">
                                    {{$error}}
                                </span>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="card-content">
                    <form method="POST" action="{{url('/usuario/login')}}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-field col s12 ">
                            <label for="correo">Correo</label>
                            <input type="email" class="validate" name="email" id="email" maxlength="50"/><br>
                        </div>
                        <div class="input-field col s12">
                            <label for="password" class="validate">Contraseña</label>
                            <input type="password" name="password" id="password" maxlength="50"/><br>
                        </div>
                        <div class="input-field col right">
                            <div class="row">
                                <i class="waves-effect waves-light btn waves-input-wrapper accent-color" style="padding: 0px; color:#FFFFFF">
                                    <input class="waves-button-input" style="height: 1cm;width: 5cm;" type="submit" name="Iniciar Sesión" value="Iniciar Sesión">
                                </i>
                            </div>
                        </div>
                    </form>
                    <p> &nbsp</p><br><br>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>
</body>
</html>
