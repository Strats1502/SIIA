$(function() {
    
    //Marca los selects con el estilo de Material Design.
    $('select').material_select();

    //Formato inicial para las fechas
    $("#fecha_inicio").val(moment($("#fecha_inicio").val(), "YYYY-MM-DD").format("DD MMM, YYYY"));
    $("#fecha_propuesta").val(moment($("#fecha_propuesta").val(), "YYYY-MM-DD").format("DD MMM, YYYY"));
    if($("#fecha_resolucion").val() != "" && $("#fecha_resolucion").val() != undefined){
    	$("#fecha_resolucion").val(moment($("#fecha_resolucion").val(), "YYYY-MM-DD").format("DD MMM, YYYY"));
    }

    //Lógica para el autocomplete de usuario responsable.
    $('#id_usuario_responsable_autocomplete').materialize_autocomplete({
        multiple: {
            enable: false
        },
        hidden: {
            enable: true,
            inputName: 'id_usuario_responsable'
        },
        dropdown: {
            el: '#usuarioResponsableDropdown',
            itemTemplate: '<li class="ac-item" data-id="<%= item.id %>" data-text=\'<%= item.text %>\'><a href="javascript:void(0)"><%= item.highlight %></a></li>'
        },
        onSelect: function (item) {
            $('#id_usuario_responsable').val(item.id);
        },
        getData: function (value, callback) {
            $.get($("#_url").val() + "/servicios/usuariosautocomplete", {q: value}).success(function(data) {
                callback(value, JSON.parse(data));
              });
            
        }
    });
    
    //Autocompletar múltiple de usuarios involucrados.
    $('#id_usuarios_involucrados_autocomplete').materialize_autocomplete({
        multiple: {
            enable: true
        },
        appender: {
            el: '.ac-users'
        },
        hidden: {
            enable: true,
            inputName: 'id_usuarios_involucrados'
        },
        dropdown: {
            el: '#usuariosInvolucradosDropdown'
        },onSelect: function (item) {
            console.log(item);
        },
        onAppend: function(item) {
            console.log(item);
        },
        getData: function (value, callback) {
            $.get($("#_url").val() + "/servicios/usuariosautocomplete", {q: value}).success(function(data) {
                callback(value, JSON.parse(data));
              });
            
        }
    });
    
    //Autocompletar autocomplete de joven responsable.        
    $('#id_joven_responsable_autocomplete').materialize_autocomplete({
        multiple: {
            enable: false
        },
        hidden: {
            enable: true,
            inputName: 'id_joven_responsable'
        },
        dropdown: {
            el: '#jovenResponsableDropdown',
            itemTemplate: '<li class="ac-item" data-id="<%= item.id %>" data-text=\'<%= item.text %>\'><a href="javascript:void(0)"><%= item.highlight %></a></li>'
        },
        onSelect: function (item) {
            $('#id_joven_responsable').val(item.id);
        },
        getData: function (value, callback) {
            $.get($("#_url").val() + "/servicios/jovenesautocomplete", {q: value}).success(function(data) {
                callback(value, JSON.parse(data));
              });
            
        }
    });
    
    //Autocomplete múltiple para beneficiados relacionados.
    $('#id_beneficiados_relacionados_autocomplete').materialize_autocomplete({
        multiple: {
            enable: true
        },
        appender: {
            el: '.ac-jovenes'
        },
        hidden: {
            enable: true,
            inputName: 'id_beneficiados_relacionados'
        },
        dropdown: {
            el: '#jovenesInvolucradosDropdown'
        },onSelect: function (item) {
        },
        onAppend: function(item) {
        },
        getData: function (value, callback) {
            $.get($("#_url").val() + "/servicios/jovenesautocomplete", {q: value}).success(function(data) {
                callback(value, JSON.parse(data));
              });
            
        }
    });


    $('#usuarios_involucrados .ac-users').on('click', '.chip', borrarValorInvolucrados);
    $('#beneficiados_relacionados .ac-jovenes').on('click', '.chip', borrarValorBeneficiados);

    //Validación de formulario para editar orden
    $("#form").validate({
        submitHandler: function(form) {
            $("#fecha_inicio").val(moment($("#fecha_inicio").val(), "DD MMM, YYYY").format("YYYY-MM-DD"));
            $("#fecha_propuesta").val(moment($("#fecha_propuesta").val(), "DD MMM, YYYY").format("YYYY-MM-DD"));
            $("#fecha_resolucion").val(moment($("#fecha_resolucion").val(), "DD MMM, YYYY").format("YYYY-MM-DD"));
            form.submit();
        },
        ignore: [], 
        rules: {
            "titulo": { required: true },
            "descripcion": { required: true },
            "fecha_inicio": { required: true },
            "fecha_propuesta": { required: true },
            "fecha_resolucion": { required: true },
            "costo_estimado": { required: true },
            "costo_real": { required: true },
            "resultado": { required: true },
            "observaciones": { required: true },
            "tipo_servicio": { required: true },
            "id_joven_responsable": { required: true },
            "id_usuario_responsable": { required: true },
            "id_usuarios_involucrados_aux": { required: true },
            "id_beneficiados_relacionados_aux": { required: true }

        },
        messages:{
            "titulo": "Este campo es obligatorio",
            "descripcion": "Este campo es obligatorio",
            "fecha_inicio": "Este campo es obligatorio",
            "fecha_propuesta": "Este campo es obligatorio",
            "fecha_resolucion": "Este campo es obligatorio",
            "costo_estimado": "Este campo es obligatorio",
            "costo_real": "Este campo es obligatorio",
            "resultado": "Este campo es obligatorio",
            "observaciones": "Este campo es obligatorio",
            "tipo_servicio": "este campo es obligatorio",
            "id_joven_responsable": "Este campo es obligatorio",
            "id_usuario_responsable": "Este campo es obligatorio",
            "id_usuarios_involucrados_aux" : "Este campo es obligatorio",
            "id_beneficiados_relacionados_aux" : "Este campo es obligatorio"
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
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

function borrarValorInvolucrados(){
	var id = $(this).attr('data-id');
	var valActuales = $('#id_usuarios_involucrados_aux').val().split(',');
	valActuales.splice($.inArray(id.toString(),valActuales),1);
	var valNuevos = valActuales;

	$('#id_usuarios_involucrados_aux').val(valNuevos);
	$('#id_usuarios_involucrados').val(valNuevos);
}

function borrarValorBeneficiados(){
    var id = $(this).attr('data-id');
    var valActuales = $('#id_beneficiados_relacionados_aux').val().split(',');
    valActuales.splice($.inArray(id.toString(),valActuales),1);
    var valNuevos = valActuales;

    $('#id_beneficiados_relacionados_aux').val(valNuevos);
    $('#id_beneficiados_relacionados').val(valNuevos);
}