$(function() {
    //Necesario para sustituir el select común de HTML5 por el de Materialize
    $('select').material_select();
    //Validación de formulario para nuevo usuario
    $("#form-crear").validate({
        submitHandler: function(form) {
            form.submit();
        },
        ignore: [],
        rules: {
            "curp": {
                required: true
            },
            "nombre": {
                required: true
            },
            "apellido_paterno": {
                required: true
            },
            "apellido_materno": {
                required: true
            },
            "email": {
                required: true
            },
            "password": {
                required: true
            },
            "confirmar_password": {
                required: true,
                equalTo: "#password"
            },
            "rol": {
                required: true
            },
            "puesto": {
                required: true
            }

        },
        messages: {

            "curp": "Este campo es obligatorio",
            "nombre": "Este campo es obligatorio",
            "apellido_paterno": "Este campo es obligatorio",
            "apellido_materno": "Este campo es obligatorio",
            "email": {
                required: "Este campo es obligatorio",
                email: "Correo inválido"
            },
            "password": "Este campo es obligatorio",
            "confirmar_password": {
                required: "Este campo es obligatorio",
                equalTo: "Las contraseñas no coinciden"
            },
            "rol": "Este campo es obligatorio",
            "puesto": "Este campo es obligatorio"

        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            $(element).addClass('invalid');
            $(error).css('color', '#F44336 ');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });


    /**
     * Método para obtener el nombre y demás información de usuarios a partir de su CURP.
     */
    $(function() {
        
        $('#rol').change(function() {
            var id_rol = $('#rol').val();
            $.ajax({
                type: 'POST',
                url: 'obtenerPermisos',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id_rol: id_rol
                },
                success: function(data) {
                    $('.list-group-item-rol').removeClass('list-group-item-info');

                    $.each(data.permisos_rol, function(index, value) {
                        $('#' + value.id).addClass('list-group-item-info');
                    });

                }
            });

        });

        $('#puesto').change(function() {
            var id_puesto = $('#puesto').val();
            $.ajax({
                type: 'POST',
                url: 'obtenerValoresPuesto',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id_puesto: id_puesto
                },
                success: function(data) {
                    $('.list-group-item-puesto').removeClass('list-group-item-info');

                    $('#area_' + data.area.id).addClass('list-group-item-info');
                    $('#direccion_' + data.direccion.id).addClass('list-group-item-info');
                    $('#dependencia_' + data.dependencia.id).addClass('list-group-item-info');

                },
                error: function(data) {

                }
            });
        })
    })
});