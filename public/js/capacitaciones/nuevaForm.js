$(function(){
	//Funcionalidad del checkbox 'publico'
	if (!$('#publico').prop('checked')) {
		$('#privado').show(600);
	}

	$('#publico').on('change', function(){
		$('#publico').prop('checked')?$('#privado').hide(600):$('#privado').show(600);
	});

	//Autocompletar múltiple de usuarios involucrados.
    var autocomplete = $('#id_usuarios_permitidos_autocomplete').materialize_autocomplete({
        multiple: {
            enable: true,
            maxSize: 100,
            onAppend: function (item) {
                console.log(item);
            }
        },
        appender: {
            el: '.ac-users',
            tagTemplate: '<tr data-id="<%= item.id %>" data-text="<%= item.text %>"><td><%= item.id %></td><td><%= item.text %></td><td><i style="cursor:pointer;" class="material-icons close tooltipped quitar-usuario" data-position="left" data-tooltip="Quitar usuario">delete</i></td></tr>'
        },
        hidden: {
            enable: true,
            inputName: 'id_usuarios_permitidos'
        },
        dropdown: {
            el: '#usuariosPermitidosDropdown'
        },/* onSelect: function (item) {
            console.log(item);
        },
        onAppend: function(item) {
            console.log(item);
        }, */
        getData: function (value, callback) {
            $.get($("#_url").val() + "/capacitaciones/usuariosautocomplete", {q: value}).success(function(data) {
                callback(value, JSON.parse(data));
          	});
        }
    });

    //Carga los usuarios q ya estaban permitidos
    if (typeof userItems != "undefined") {
        for (var i = 0; i < userItems.length; i++) {
            var temp = userItems[i];
            autocomplete.append(temp);
        }
    }
    
    // $('.quitar-usuario').click(function(){
    //     var idBorrar = $(this.parentElement).siblings()[0].textContent;
    //     var nombreBorrar = $(this.parentElement).siblings()[1].textContent;
    //     autocomplete.remove( {id:idBorrar, text: nombreBorrar} );
    // });

    //Inicializacion de tooltips generados dinamicamente
    $('.tooltipped').tooltip({delay: 50});

    //Método para cambiar la imagen
    $("#img-capacitacion").on('change', function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(".l1 img")
                    .error(() => $("#img-convocatoria").attr("src", "../../img/ic_unknow.png"))
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    // Validacion del formulario
    $("#form-crear").validate({
        ignore: [],
        rules: {
            titulo: "required",
            descripcion: "required",
            "img-capacitacion": {
                required: {
                    depends: function (element) {
                        return (typeof userItems == "undefined");
                    }
                }
            },
            id_usuarios_permitidos: {
                required: {
                    depends: function (element) {
                        return !$("#publico").is(":checked");
                    }
                }
            }
        },
        messages: {
            "titulo": "Este campo es obligatorio",
            "descripcion": "Este campo es obligatorio",
            "img-capacitacion": "Este campo es obligatorio",
            "id_usuarios_permitidos": "Al menos un usuario debe tener acceso a la capacitación"
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            var placement = $(element).parents('.input-field');
            $(element).addClass('invalid');
            $(error).css('color', '#F44336 ');
            if (placement) {
                $(placement).append(error);
            } else {
                error.insertAfter(element);
            }
        }
    });
    
});