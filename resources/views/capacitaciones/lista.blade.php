<div class="row">
    <!-- Lógica para mostrar tabla -->
    <div class="rowsection" id="table">
        @if(count($capacitaciones) == 0)
        <div class="section">No hay datos</div>
        @else
        <table class="highlight striped">
            <thead>
                <tr>
                    <th class="header" data-field="capacitacion.titulo" style="width: 100px; cursor: pointer">{{trans('str.menu.menu_9.tabla.col0')}}</th>
                    <th class="header" data-field="capacitacion.descripcion" style="width: 150px; cursor: pointer">{{trans('str.menu.menu_9.tabla.col1')}}</th>
                    <th class="header" data-field="capacitacion.inscritos" style="width: 100px; cursor: pointer">{{trans('str.menu.menu_9.tabla.col2')}}</th>
                    <th class="header" data-field="capacitacion.aprobados" style="width: 100px; cursor: pointer">{{trans('str.menu.menu_9.tabla.col3')}}</th>
                    <th class="header center-align" data-field="estadisticas" style="width: 20px; cursor: pointer">{{trans('str.menu.menu_9.tabla.col4')}}</th>
                    <th class="header center-align" data-field="editar" style="width: 20px; cursor: pointer">{{trans('str.menu.menu_9.tabla.col5')}}</th>
                    <th class="header center-align" data-field="eliminar" style="width: 20px; cursor: pointer">{{trans('str.menu.menu_9.tabla.col6')}}</th>
                </tr>
            </thead>
            <tbody id="tabla-usuarios">
                    @foreach($capacitaciones as $capacitacion)
                        <tr>
                            <td style="" >{{isset($capacitacion->titulo) ? $capacitacion->titulo : ""}}</td>
                            <td style="">{{isset($capacitacion->descripcion) ? $capacitacion->descripcion : ""}}</td>
                            <td style="">Ejemplo</td>
                            <td style="">Ejemplo</td>
                            <td class="center-align" style="">
                                <a href="{{url('capacitaciones/estadisticas/'.$capacitacion->id)}}">
                                    <i class="material-icons grey-text estadisticas" style="width:30px; cursor: pointer" data-capacitacion-id="{{$capacitacion->id}}">insert_chart</i>
                                </a>
                            </td>
                            <td class="center-align" width="20">
                                <a href="{{url('capacitaciones/editar/'.$capacitacion->id)}}">
                                    <i class="material-icons grey-text editar" style="width:30px; cursor: pointer" data-capacitacion-id="{{$capacitacion->id}}">mode_edit</i>
                                </a>
                            </td>
                            <td class="center-align" width="20">
                                <i class="material-icons grey-text borrar" style="cursor: pointer" data-capacitacion-id="{{$capacitacion->id}}">delete</i>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        @endif
        <ul class="pagination">
            <!-- -->
        </ul>
    </div>
</div>