<div class="row">
    <!-- Lógica para mostrar tabla -->
    <div class="rowsection" id="table">
        @if(count($anuncios) == 0)
        <div class="section">No hay datos</div>
        @else
        <table class="highlight">
            <thead>
                <tr>
                    <th class="header" data-field="id" style="width: 100px; cursor: pointer">{{trans('str.menu.menu_4.tabla.col0')}}</th>
                    <th class="header" data-field="titulo" style="width: 150px; cursor: pointer">{{trans('str.menu.menu_4.tabla.col1')}}</th>
                    <th class="header hide-on-med-and-down" data-field="descripcion" style="width: 100px; cursor: pointer">{{trans('str.menu.menu_4.tabla.col2')}}</th>
                    <th class="header hide-on-med-and-down" data-field="url" style="width: 100px; cursor: pointer">{{trans('str.menu.menu_4.tabla.col3')}}</th>
                    <th class="header hide-on-med-and-down" data-field="fecha_inicio" style="width: 100px; cursor: pointer">{{trans('str.menu.menu_4.tabla.col4')}}</th>
                    <th class="header hide-on-med-and-down" data-field="fecha_fin" style="width: 100px; cursor: pointer">{{trans('str.menu.menu_4.tabla.col5')}}</th>
                    <th class="header center" width="20" data-field="estadisticas"style="width: 100px; cursor: pointer">{{trans('str.menu.menu_4.tabla.col6')}}</th>
                    <th class="header center" width="20" data-field="editar"style="width: 100px; cursor: pointer">{{trans('str.menu.menu_4.tabla.col7')}}</th>
                    <th class="header center" width="20" data-field="eliminar"style="width: 100px; cursor: pointer">{{trans('str.menu.menu_4.tabla.col8')}}</th>
                </tr>
            </thead>
            <tbody id="tabla-anuncios">
                    @foreach($anuncios as $anuncio)
                        <tr>
                            <td  class="" style="" >{{$anuncio->id_publicidad}}</td>
                            <td  class="" style="" >{{$anuncio->titulo}}</td>
                            <td  class=" hide-on-med-and-down" style="" >{{$anuncio->descripcion}}</td>
                            <td  class=" hide-on-med-and-down" style="" >{{$anuncio->url}}</td>
                            <td  class=" hide-on-med-and-down" style="" >{{$anuncio->fecha_inicio->format('d/m/Y')}}</td>
                            <td  class=" hide-on-med-and-down" style="" >{{$anuncio->fecha_fin->format('d/m/Y')}}</td>  
                            <td class="center" width="20">
                                    <i class='material-icons grey-text' style='cursor:pointer'>insert_chart</i>   
                            </td>
                            <td  class="center"  width="20">
                                <a href="{{url('publicidad/editar/'.$anuncio->id_publicidad)}}">
                                    <i class="material-icons grey-text editar" style="width:30px; cursor: pointer" data-publicidad-id="{{$anuncio->id_publicidad}}">mode_edit</i>
                                </a>
                            </td> 

                            <td class="center" width="20">
                                <i class="material-icons grey-text borrar delete" style="cursor: pointer" data-id="{{$anuncio->id_publicidad}}">delete</i>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        @endif
        <ul class="pagination">
            {{$anuncios->links()}}
        </ul>
    </div>
</div>