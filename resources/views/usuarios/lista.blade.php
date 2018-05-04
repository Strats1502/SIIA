<div class="row">
    <!-- Lógica para mostrar tabla -->
    <div class="rowsection" id="table">
        @if(count($usuarios) == 0)
            <div class="section">No hay datos</div>
        @else
            <table class="highlight">
                <thead>
                <tr>
                    <th class="header" data-field="funcionario.id" style="width: 100px; cursor: pointer">ID</th>
                    <th class="header" data-field="datos_usuario.nombre" style="width: 150px; cursor: pointer">Nombre
                    </th>
                    <th class="header" data-field="datos_usuario.apellido_paterno"
                        style="width: 100px; cursor: pointer">Apellido Paterno
                    </th>
                    <th class="header" data-field="datos_usuario.apellido_materno"
                        style="width: 100px; cursor: pointer">Apellido Materno
                    </th>
                    <th class="header" data-field="usuario.email" style="width: 100px; cursor: pointer">Correo
                        electrónico
                    </th>
                    <th class="header" data-field="funcionario.telefono" style="width: 100px; cursor: pointer">
                        Tipo
                    </th>
                    <!--<th data-field="editar">Editar</th>
                    <th data-field="eliminar">Eliminar</th>-->
                </tr>
                </thead>

                <tbody id="tabla-usuarios">
                @foreach($usuarios as $user)
                    <td style="width: 100px">{{$user->id}}</td>
              
                    <td style="width: 150px">{{$user->nombre}}</td>
                    <td style="width: 100px">{{$user->apellido_paterno}}</td>
                    <td style="width: 100px">{{$user->apellido_materno}}</td>
                    <td style="width: 100px">{{$user->correo }}</td>
                    <td style="width: 100px">{{$user->tipo}}</td>
                    <!--<td class="center-align"><i class="material-icons grey-text" style="cursor: pointer" data-user-id="{{$user->id}}">mode_edit</i></td>
                            <td class="center-align"><i class="material-icons grey-text borrar" style="cursor: pointer" data-user-id="{{$user->id}}">delete</i></td>-->
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>

</div>
