<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <link rel="shortcut icon" type="image/png" href="{{ url('/img/logo.png') }}" />
        <link type="image/png" href="{{ url('/img/default-user-image.png') }}" />
        <input type="hidden" id="url" name="url" value="{{url('/')}}">
        <link rel="stylesheet" href="{{url('/css/materialize.min.css')}}">
        <link rel="stylesheet" href="{{url('/css/style.css')}}">
        <link rel="stylesheet" href="{{url('/css/lolliclock.css')}}">
        <link rel="stylesheet" href="{{url('/css/toastr.min.css')}}">
        <link rel="stylesheet" href="{{url('/css/nouislider.css')}}">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="{{url('/js/jquery-1.12.3.js')}}"></script>
        <script type="text/javascript" src="{{url('/js/materialize.js')}}"></script>
        <script type="text/javascript" src="{{url('/js/lolliclock.js')}}"></script>
        <script type="text/javascript" src="{{url('/js/ion.rangeSlider.js')}}"></script>
        <script type="text/javascript" src="{{url('/js/moment.js')}}"></script>
        <script type="text/javascript" src="{{url('/js/moment-with-locales.js')}}"></script>
        <script type="text/javascript" src="{{url('/js/toastr.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/js/jquery.twbsPagination.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/js/nouislider.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/js/jquery.twbsPagination.min.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".button-collapse").sideNav();
                $('.modal-trigger').leanModal();
                $('.datepicker').pickadate({
                    selectMonths: true,
                    selectYears: 15,
                    // The title label to use for the month nav buttons
                    labelMonthNext: 'Mes siguiente',
                    labelMonthPrev: 'Mes anterior',

// The title label to use for the dropdown selectors
                    labelMonthSelect: 'Selecciona un mes',
                    labelYearSelect: 'Selecciona un año',

// Months and weekdays
                    monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
                    monthsShort: [ 'ene.', 'feb.', 'mar.', 'abr.', 'may.', 'jun.', 'jul.', 'ago.', 'sep.', 'oct.', 'nov.', 'dic.' ],
                    weekdaysFull: [ 'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado' ],
                    weekdaysShort: [ 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab' ],

// Materialize modified
                    weekdaysLetter: [ 'D', 'L', 'M', 'X', 'J', 'V', 'S' ],

// Today and clear
                    today: 'Hoy',
                    clear: 'Limpiar',
                    close: 'Cerrar'
                });
                moment.locale('es');
            });
        </script>
        @yield('head')
    </head>
    <body id="body">
    <input type="hidden" id="_url" value="{{ url('/') }}">
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
    <!--Barra de navegación-->
    <nav style="height:100px; color:#black;">
        <div class="nav-wrapper white-color" style="height:100px;">
            <a href="{{url('inicio')}}" class="brand-logo" style="padding-left: 2.5%;">
                <img src="{{$escuela->ruta_imagen}}" style="vertical-align: middle; display:inline-block; height:95px;" alt="Inicio">
                <div style="display:inline-block; line-height: 100px; color: #4d4d4d;">{{$escuela->nombre}}</div>
            </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul  id="nav" class="right hide-on-med-and-down">
                <li><a class="menuItem" href="{{url('escuela')}}">Escuela</a></li>

                <li><a class="menuItem menuSelected" href="{{url('usuarios')}}">Usuarios</a></li>

                <li><a class="menuItem" href="{{url('grupos')}}">Grupos</a></li>

                <li><a style="margin:0;cursor:pointer;">Usuario nombre <i style="display:inline-block;vertical-align: middle;" class="material-icons">arrow_drop_down</i></a></li>
                {{--<li><p>{{$usuario['nombre']}}</p></li>--}}
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col s10 offset-s1">
            <nav id="submenu" class="submenu col l2 m3 s4" style=" box-shadow:none;background:#fff;color:#ddd;margin-top:30px;">
                <ul>
                    @foreach ($submenuItems as $submenuItem)
                        <li><a class="{{$submenuItem['selected']?'submenuSelected':''}}" href="{{$submenuItem['link']}}">{{$submenuItem['nombre']}}</a></li>
                    @endforeach
                </ul>
            </nav>
            <div class="container col l10 m9 s8" id="container" style="background:white; border-left: #9d9d9d 1px solid; padding:0 30px; margin-top:30px;">
                @yield('contenedor')
            </div>
        </div>
    </div>
    @yield('modalNuevo')
    @yield('modalEditar')
    </body>
</html>
