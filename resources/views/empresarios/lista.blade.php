<div class="row">
    <!-- Lógica para mostrar tabla -->
    <div class="rowsection" id="table">
        @if(count($usuarios) == 0)
        <div class="section">No hay datos</div>
        @else
        <table class="highlight">
            <thead>
                <tr>
                    <th class="header " data-field="codigo_guanajoven.id_codigo_guanajoven" style="width: 100px; cursor: pointer">{{trans('str.menu.menu_2.tabla.col0')}}</th>
                    <th class="header " data-field="datos_usuario.nombre" style="width: 150px; cursor: pointer">{{trans('str.menu.menu_2.tabla.col1')}}</th>
                    <th class="header " data-field="datos_usuario.apellido_paterno" style="width: 100px; cursor: pointer">{{trans('str.menu.menu_2.tabla.col2')}}</th>
                    <th class="header " data-field="datos_usuario.apellido_materno" style="width: 100px; cursor: pointer">{{trans('str.menu.menu_2.tabla.col3')}}</th>
                    <th class="header  hide-on-med-and-down" data-field="datos_usuario.curp" style="width: 100px; cursor: pointer">{{trans('str.menu.menu_2.tabla.col4')}}</th>
                    <th class="header  hide-on-med-and-down" data-field="usuario.email" style="width: 100px; cursor: pointer">{{trans('str.menu.menu_2.tabla.col5')}}</th>
                    <th class="header  hide-on-med-and-down" data-field="genero.nombre"style="width: 100px; cursor: pointer">{{trans('str.menu.menu_2.tabla.col6')}}</th>
                    <th class="header  hide-on-med-and-down" data-field="datos_usuario.fecha_nacimiento" style="width: 100px; cursor: pointer">{{trans('str.menu.menu_2.tabla.col7')}}</th>
                    <th class="header  hide-on-med-and-down" data-field="usuario.created_at" style="width: 100px; cursor: pointer">{{trans('str.menu.menu_2.tabla.col8')}}</th>
                    <th data-field="editar" class="">{{trans('str.menu.menu_2.tabla.col9')}}</th>
                    <th data-field="eliminar" class="">{{trans('str.menu.menu_2.tabla.col10')}}</th>
                </tr>
            </thead>
            <tbody id="tabla-usuarios">
                    @foreach($usuarios as $user)
                        <tr>
                            <td  class="" style="" >{{isset($user->codigoGuanajoven) ? $user->codigoGuanajoven->id_codigo_guanajoven : ""}}</td>
                            <td  class="" style="">{{isset($user->datosUsuario) ? $user->datosUsuario->nombre : ""}}</td>
                            <td  class="" style="">{{isset($user->datosUsuario) ? $user->datosUsuario->apellido_paterno : ""}}</td>
                            <td  class="" style="">{{isset($user->datosUsuario) ? $user->datosUsuario->apellido_materno : ""}}</td>
                            <td  class=" hide-on-med-and-down" style="">{{isset($user->datosUsuario) ? $user->datosUsuario->curp : ""}}</td>
                            <td  class=" hide-on-med-and-down" style="">{{$user->email}}</td>
                            <td  class=" hide-on-med-and-down" style="">{{isset($user->datosUsuario->genero) ? $user->datosUsuario->genero->nombre: ""}}</td>
                            <td  class=" hide-on-med-and-down" style="">{{isset($user->datosUsuario->fecha_nacimiento) ? $user->datosUsuario->fecha_nacimiento->diffInYears(\Carbon\Carbon::now()) : ""}}</td>
                            <td  class=" hide-on-med-and-down" style="">{{isset($user->created_at) ? $user->created_at->format('d/m/Y') : ""}}</td>
                            <td  class="center"  width="20">
                                <a href="{{url('empresarios/editar/'.$user->id)}}">
                                    <i class="material-icons grey-text editar" style="width:30px; cursor: pointer" data-user-id="{{$user->id}}">mode_edit</i>
                                </a>
                            </td>
                            <td class="center" width="20">
                                <i class="material-icons grey-text borrar" style="cursor: pointer" data-user-id="{{$user->id}}">delete</i>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        @endif
        <ul class="pagination">
            {{$usuarios->links()}}
        </ul>
    </div>
</div>