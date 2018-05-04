$(function() {
    var numOpcionNueva = 0;
    var contador = 0;


	//Funcionalidad de los botones para eliminar un tema.
    $(document).on('click', '.borrar-tema', function(e){
        var btn = $(this),
            yesButton = null,
            id;
        $("#modal-borrar-tema").openModal();
        $("#id_tema").val(btn.data('tema-id'));
    });

	//Funcionalidad de los botones para agrear un tema.
    $(document).on('click', '.nuevo-tema', function(e){
        var btn = $(this),
            yesButton = null,
            id;
        $("#modal-nuevo-tema").openModal();
    });

	//Funcionalidad de los botones para agrear documento a un tema.
    $(document).on('click', '.agregar-documento', function(e){
        var btn = $(this),
            yesButton = null,
            id;
        $("#modal-nuevo-documento").openModal();
        $('#modal-nuevo-documento #tema-id').val(btn.data('tema-id'));
    });

    $('label', '.modal').css('left', '0');

    //Funcionalidad de los botones para borrar un elemento.
    $(document).on('click', '.borrar-elemento', function(e){
        var btn = $(this),
            yesButton = null,
            id,
            ruta = $("form", "#modal-borrar-elemento").attr('action');

        $("#modal-borrar-elemento").openModal();
        $("#tipo_elemento").val(btn.data('tipo'));
        if (btn.data('tipo') == 'video') {
            $("form", "#modal-borrar-elemento").attr('action', ruta+'/eliminar-video');
        } else if ( btn.data('tipo') == 'documento' ){
            $("form", "#modal-borrar-elemento").attr('action', ruta + '/eliminar-documento');
        }
        $("#id_elemento").val(btn.data('elemento-id'));
    });

    //Funcion para abrir el modal apropiado para editar tema
    $(document).on('click', '.editar-tema', function(e){
        var btn = $(this);
        var tema_id = btn.data('tema-id');
        var oculto = $('div[data-tema-id=' + tema_id +']');
        var titulo = $('#titulo', oculto).val();
        var ruta_imagen = $('#ruta_imagen', oculto).val();

        $('label', '#modal-editar-tema').addClass('active');

        $('img', '#modal-editar-tema').attr('src',ruta_imagen);
        $('#ruta_guardada', '#modal-editar-tema').val(ruta_imagen);
        $('#tema_titulo', '#modal-editar-tema').val(titulo);
        $('#tema-id', '#modal-editar-tema').val(tema_id);
        $('#modal-editar-tema').openModal();
    });

    //Método para cambiar la imagen en editar tema
    $("#ruta_imagen", '#modal-editar-tema').on('change', function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#imagen-editar-tema")
                    .error(() => $("#imagen-nuevo-tema").attr("src", "../../img/ic_unknow.png"))
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    //Funcionalidad de los botones para agrear video a un tema.
    $(document).on('click', '.agregar-video', function(e){
        var btn = $(this),
            yesButton = null,
            id;

        $('#video_titulo #video_descripcion', '#videoItem').css({
            marginLeft: '0',
            width : '100%'
        });

        var anteriores = $('.videoItem').length;
        for (var i = $('.videoItem').length-1; i > 0; i--) {
                $('.videoItem')[i].remove();
        }

        $('div.error','.videoItem').remove();
        $('input', '.videoItem').removeClass('invalid');
        $('textarea', '.videoItem').removeClass('invalid');

        $('textarea', '.videoItem').val('');
        $('input', '.videoItem').val('');
        $('img', '.videoItem').attr('src', '');
        $('.inputs').toggleClass('s9');
        $('.inputs').css('width','100%');
        $("#tema-id", "#modal-nuevo-video").val(btn.data('tema-id'));
        
        $("#modal-nuevo-video").openModal();
    });
    autocompletadoVideo($('#modal-nuevo-video'));

    //Funcion para abrir el modal para editar video y llenar los campos
    $(document).on('click', '.editar-video', function(e){
        var btn = $(this);
        id = btn.data('video-id');
        ocultos = $('div[data-video-id='+id+']');
        var tema_id = btn.data('tema-id');
        var video_link = $('#video_link_hidden', ocultos).val();
        var video_imagen = $('#video_imagen_hidden', ocultos).val();
        var video_titulo = $('#video_titulo_hidden', ocultos).val();
        var video_descripcion = $('#video_descripcion_hidden', ocultos).val();
        var video_identificador = $('#video_identificador_hidden', ocultos).val();
        var video_duracion = $('#video_duracion_hidden', ocultos).val();

        $('#video_link', '#modal-editar-video').val(video_link);
        $('#video_link', '#modal-editar-video').siblings('label').addClass('active');
        $('#video_titulo', '#modal-editar-video').val(video_titulo);
        $('#video_titulo', '#modal-editar-video').siblings('label').addClass('active');
        $('#video_descripcion', '#modal-editar-video').val('');
        $('#video_descripcion', '#modal-editar-video').val(video_descripcion);
        $('#video_descripcion', '#modal-editar-video').siblings('label').addClass('active');
        $('img', '#modal-editar-video').attr('src', video_imagen);
        $('#ruta_imagen', '#modal-editar-video').val(video_imagen);
        $('#id', '#modal-editar-video').val(id);
        $('#identificador', '#modal-editar-video').val(video_identificador);
        $('#duracion', '#modal-editar-video').val(video_duracion);
        $('#modal-editar-video').openModal();
    });
    autocompletadoVideo($('#modal-editar-video'));

    function autocompletadoVideo(modal){
        $('#link_cargado', modal).on('change', function () {
            var url = $(this).val();
            var id = '';

            contador=0;
            $('div.error','.videoItem').remove();
            $('input', '.videoItem').removeClass('invalid');
            $('textarea', '.videoItem').removeClass('invalid');

            id = obtenerID(url);

            if ( id.length == 11 ) {
                vid = id;
                $.get(
                    "https://www.googleapis.com/youtube/v3/videos", {
                        part: 'snippet,contentDetails',
                        id: vid,
                        key: 'AIzaSyBLHlZuSWq8GLIUTZT_41aIvRribY45Zys'
                    }, function(data){
                        var descripcion = data.items[0].snippet.description;
                        if (data.items[0].snippet.thumbnails != undefined) {
                            if (data.items[0].snippet.thumbnails.maxres != undefined) {
                                rutaImagen = data.items[0].snippet.thumbnails.maxres.url;
                            } else if (data.items[0].snippet.thumbnails.high != undefined){
                                rutaImagen = data.items[0].snippet.thumbnails.high.url;
                            } else {
                                rutaImagen = data.items[0].snippet.thumbnails.default.url;
                            }
                        }
                        var titulo = data.items[0].snippet.localized.title;
                        var duracion = data.items[0].contentDetails.duration;
                        $('#video_titulo', modal).val(titulo);
                        $('#video_descripcion', modal).val(descripcion);
                        $('#video_descripcion', modal).siblings('label').addClass('active');
                        $('#identificador', modal).val(vid);
                        $('#duracion', modal).val(duracion);
                        $('#ruta_imagen', modal).val(rutaImagen);
                        $('#video_link', modal).val('https://www.youtube.com/watch?v='+vid);
                        $('.image').show(1200);
                        $('img', modal).attr('src', rutaImagen);
                        $('.inputs', modal).animate({
                            width : '75%'
                        },1000);
                        $('.inputs').toggleClass('s9');
                    }
                );
            } else if ( id.length == 34 ){
                getData(id);
            }
        });
    }

    function getData(vid, nextPage){
        $.get("https://www.googleapis.com/youtube/v3/playlistItems", {
                part: 'snippet,contentDetails',
                playlistId: vid,
                maxResults: 50,
                key: 'AIzaSyBLHlZuSWq8GLIUTZT_41aIvRribY45Zys',
                pageToken: (nextPage!=undefined)?nextPage:''
            }, function(data){
                nextPage = data.nextPageToken;
                for (var i = 0; i < data.items.length; i++) {
                    var clon = $($('.videoItem')[0]).clone().css('display', 'none').insertAfter($('.videoItem')[0]);
                    var descripcion = data.items[i].snippet.description;
                    var rutaImagen = '';
                    if (data.items[i].snippet.thumbnails != undefined) {
                        if (data.items[i].snippet.thumbnails.maxres != undefined) {
                            rutaImagen = data.items[i].snippet.thumbnails.maxres.url;
                        } else if (data.items[i].snippet.thumbnails.high != undefined){
                            rutaImagen = data.items[i].snippet.thumbnails.high.url;
                        } else {
                            rutaImagen = data.items[i].snippet.thumbnails.default.url;
                        }
                    }
                    var titulo = data.items[i].snippet.title;
                    var videoId = data.items[i].snippet.resourceId.videoId;
                    var identificador = data.items[i].contentDetails.videoId;
                    
                    $('label', clon).addClass('active');
                    $('#video_titulo', clon).val(titulo);
                    $('#video_titulo', clon).attr('name','video_titulo['+(i+contador)+']');
                    $('#video_descripcion', clon).val(descripcion);
                    $('#video_descripcion', clon).attr('name','video_descripcion['+(i+contador)+']');
                    $('#identificador', clon).val(identificador);
                    $('#identificador', clon).attr('name','identificador['+(i+contador)+']');
                    $('#video_link', clon).val('https://www.youtube.com/watch?v='+identificador);
                    $('#video_link', clon).attr('name','video_link['+(i+contador)+']');
                    $('#ruta_imagen', clon).val(rutaImagen);
                    $('#ruta_imagen', clon).attr('name','ruta_imagen['+(i+contador)+']');
                    $('img', clon).attr('src', rutaImagen);
                    $('img', clon).css('width', '100%');
                    $('#duracion', clon).attr('name', 'duracion['+(i+contador)+']');
                    $('.image', clon).show(1000);
                    $('.inputs', clon).animate({
                        width : '75%'
                    },1000);
                    $('.inputs', clon).toggleClass('s9');
                }
                if(data.nextPageToken != undefined && data.nextPageToken != null)
                    getData(vid, data.nextPageToken);
                else {
                    $($('.videoItem')[0]).hide(700);
                    $('.videoItem')[0].remove();
                    $('.videoItem').show(700);
                }
                contador+=50;
            }
        );
    }

    //Función para obtener id de youtube desde una url
    function obtenerID(url){
        // URL's probadas:
        // https://www.youtube.com/watch?v=9ts5Qr9kXP8
        // https://www.youtube.com/playlist?list=PLXNx42ObR5Rh4d6w1LouK3Z_0kFusA9b7
        // https://www.youtube.com/playlist?list=PLXNx42ObR5RgUmphaFj-Whz3CZO6DRwTj
        // https://www.youtube.com/playlist?list=PLsRNoUx8w3rMfIQNC5iY2PfXtonVxUqFR
        // https://www.youtube.com/playlist?list=PLsRNoUx8w3rOyL_Wtdvic2pg-tK-vbZWK
        // https://www.youtube.com/playlist?list=PLmBFTxNFZbn-hRwaLeDbYkJ2mHb_8FW4J
        var newval = '',
            res = '',
            $this = $(this);

        if (newval = url.match(/(\?|&)v=([^&#]+)/)) {

            res = newval.pop();

        } else if (newval = url.match(/(\.be\/)+([^\/]+)/)) {

            res = newval.pop();

        } else if (newval = url.match(/(\embed\/)+([^\/]+)/)) {

            res = newval.pop().replace('?rel=0','');

        }

        if (res.length != 11){
            if (newval = url.match(/(\?|&)list=([^&#]+)/)) {
                res = newval.pop();
            }
        }
        if(res.length != 34 && res.length != 11){
            return -1;
        } else return res;

    }

    //Cambia color al indicador de la pestaña seleccionada
    $('.indicator').css('background-color', primaryColor);

    //Funcionalidad de los botones para editar un quiz.
    $(document).on('click', '.editar-quiz', function(e){
        var btn = $(this),
            yesButton = null,
            id = btn.data('elemento-id');


        $('.pregunta-container').remove();
        $('#preguntasBorradas', '#modal-editar-quiz').val('');
        $('#opcionesBorradas','#modal-editar-quiz').val('');
        /*
        preguntas[0] -> pregunta.id -> id
                        pregunta.texto -> texto
                        pregunta.opciones -> opciones[0] -> opcion.id -> id
                                                             opcion.texto -> texto
                                                             opcion.correcta -> correcta
        */

        var oculto = $('div[data-quiz-id='+id+']');
        var preguntas = [];

        $('#quiz-titulo','#modal-editar-quiz').val( $('.quiz-titulo',oculto).val() );
        $('#quiz-id','#modal-editar-quiz').val( id );
        $('label','#modal-editar-quiz').addClass('active');

        for (var i = 0; i < $('div.pregunta', oculto).length; i++) {
            var pregunta_div = $('div.pregunta', oculto)[i];
            var pregunta = [];
            
            pregunta.id = $('.pregunta-id', pregunta_div).val();
            pregunta.texto = $('.pregunta-texto', pregunta_div).val();
            pregunta.opciones = [];

            for (var j = 0; j < $('div.opcion', pregunta_div).length; j++) {
                var opcion_div = $('div.opcion', pregunta_div)[j];
                var opcion = [];
                
                opcion.id = $('.opcion-id', opcion_div).val();
                opcion.correcta = $('.opcion-correcta', opcion_div).val();
                opcion.texto = $('.opcion-texto', opcion_div).val();
                pregunta.opciones.push(opcion);
            }

            preguntas.push(pregunta);
        }

        var agregar = "";
        for (var k = 0; k < preguntas.length; k++) {
            var preg = preguntas[k];
            agregar += '<div class="pregunta-container" id="preg-'+k+'" style="margin-top: 50px;">';
            agregar += '<div class="row">';
            agregar +=  '<div class="input-field" style="margin-bottom: -25px;">';
            agregar +=      '<input id="pregunta-id-' + preg.id + '" name="preguntas[' + k + '][id]" type="hidden" value="' + preg.id + '" class="pregunta-id">';
            agregar += '<input id="pregunta-' + preg.id + '" name="preguntas[' + k + '][texto]" data-msg-required="Este campo es obligatorio" type="text" value="' + preg.texto +'" required>';
            agregar +=      '<label for="pregunta-'+preg.id+'" class="active" style="left:0;">Pregunta</label>';
            agregar +=   '</div>';
            agregar +=  '</div>';
            for (var l = 0; l < preg.opciones.length; l++) {
                var op = preg.opciones[l];
                agregar += '<div class="input-field opcion">';
                agregar +=    '<input id="opcion-id-' + op.id + '" name="preguntas[' + k + '][opciones][' + l + '][id]" value="'+op.id+'" type="hidden" class="validate opcion-id">';
                if(op.correcta == 1)
                    agregar += '<input id="opcion-'+op.id+'" name="preguntas['+k+'][correcta]" checked value="'+l+'" type="radio" class="with-gap validate">';
                else
                    agregar += '<input id="opcion-' + op.id + '" name="preguntas[' + k + '][correcta]" type="radio" value="' + l +'" class="with-gap validate">';
                agregar +=    '<label for="opcion-'+op.id+'" style="top: auto; left: 0;">';
                agregar += '<input type="text" name="preguntas[' + k + '][opciones][' + l + '][texto]" id="opcion-' + op.id + '-texto" style="height: 30px; margin-bottom: 5px;" value="' + op.texto +'" data-msg-required="Este campo es obligatorio" required>';
                agregar +=    '</label>';
                agregar +=    '<i class="material-icons borrar-opcion" style="margin-left: 15px; cursor: pointer; width: 35px;height:35px;">delete</i>';
                agregar += '</div>';
            }
            agregar += '<div class="opciones-agregadas">';
            agregar += '</div>';
            agregar += '<div class="input-field">';
            agregar +=  '<input id="deshabilitado" disabled="disabled" type="radio">';
            agregar += '<label for="deshabilitado" style="left:0;"><i data-num-pregunta="'+k+'" class="btn btn-deshabilitado">Añadir opción</i></label>';
            agregar += '</div>';
            agregar += '<i class="material-icons small borrar-pregunta" style="cursor: pointer; margin-left: 90%">delete</i>';
            agregar += '<div class="divider"></div>';
            agregar += '</div>';
        }

        $('#preguntas').append(agregar);
        $('#modal-editar-quiz').openModal();
    });

    //Boton agregar opcion en editar quiz
    $(document).on('click', '.btn-deshabilitado', function(e){
        var btn = $(this);
        var pregunta = btn.data('num-pregunta');
        var numOpcion = $('.opcion-agregada', '#preg-'+pregunta).length;
        var div = '<div class="input-field opcion-agregada" style="display:none">';
        div += '<input id="opcion-nueva-'+numOpcion+'-'+pregunta+'" name="preguntas'+( $('#preg-'+pregunta).hasClass('pregunta-nueva')?'Nuevas':'' )+'['+pregunta+'][correcta]" value="'+numOpcion+',n " type="radio" class="with-gap validate">';
        div += '<label for="opcion-nueva-' + numOpcion + '-'+pregunta+'" style="top: auto;">';
        div += '<input type="text" name="preguntas' + ($('#preg-' + pregunta).hasClass('pregunta-nueva') ? 'Nuevas' : '') + '[' + pregunta + '][opcionesAgregadas][' + numOpcion + ']" id="opcion-nueva-' + numOpcion +'-texto" style="height: 30px; margin-bottom: 5px;" data-msg-required="Este campo es obligatorio" required>';
        div += '</label><i class="material-icons borrar-opcion" style="margin-left: 15px; cursor: pointer; width: 35px;height:35px;">delete</i></div>';
        var preguntaContainer = btn.parents('.pregunta-container');
        $('.opciones-agregadas', preguntaContainer).append(div);
        $('.opcion-agregada').show(200);
        // numOpcionNueva++;
    });

    //Boton para agregar pregunta en editar quiz
    $(document).on('click', '.agregar-pregunta', function () {
        var numPregunta = '';
        var div = '';
        numPregunta = $('.pregunta-container', '#modal-editar-quiz').length;
        // numPregunta = $('.pregunta-nueva', '#modal-editar-quiz').length + $('.pregunta-container', '#modal-editar-quiz').length;
        div += '<div class="pregunta-container pregunta-nueva" id="preg-' + numPregunta +'" style="margin-top: 50px; display:none;">';
        div += '<div class="input-field" style="margin-bottom: -25px;">';
        div += '<input id="pregunta-' + numPregunta + '" name="preguntasNuevas[' + numPregunta + '][texto]" type="text" data-msg-required="Este campo es obligatorio" required>';
        div += '<label for="pregunta-' + numPregunta + '" class="active" style="left:0;">Pregunta</label>';
        div += '</div>';
        div += '<div class="input-field opcion-agregada">';
        div += '<input id="opcion-nueva-0-'+numPregunta+'" name="preguntasNuevas[' + numPregunta + '][correcta]" type="radio" value="0,n" class="with-gap validate">';
        div += '<label for="opcion-nueva-0-' + numPregunta + '" style="top: auto;"><input type="text" name="preguntasNuevas[' + numPregunta +'][opcionesAgregadas][0]" id="opcion-nueva-0-texto" style="height: 30px; margin-bottom: 5px;" data-msg-required="Este campo es obligatorio" required></label>';
        div += '<i class="material-icons borrar-opcion" style="margin-left: 15px; cursor: pointer; width: 35px;height:35px;">delete</i>';
        div += '</div>';
        div += '<div class="input-field opcion-agregada">';
        div += '<input id="opcion-nueva-1-' + numPregunta +'" name="preguntasNuevas[' +numPregunta+ '][correcta]" type="radio" value="1,n" class="with-gap validate">';
        div += '<label for="opcion-nueva-1-' + numPregunta + '" style="top: auto;"><input type="text" name="preguntasNuevas[' + numPregunta +'][opcionesAgregadas][1]" id="opcion-nueva-1-texto" style="height: 30px; margin-bottom: 5px;" data-msg-required="Este campo es obligatorio" required></label>';
        div += '<i class="material-icons borrar-opcion" style="margin-left: 15px; cursor: pointer; width: 35px;height:35px;">delete</i>';
        div += '</div>';
        div += '<div class="opciones-agregadas">';
        div += '</div>';
        div += '<div class="input-field">';
        div += '<input id="deshabilitado" disabled="disabled" type="radio">';
        div += '<label for="deshabilitado"><i data-num-pregunta="' + numPregunta +'" class="btn btn-deshabilitado">Añadir opción</i></label>';
        div += '</div>';
        div += '<i class="material-icons small borrar-pregunta" style="cursor: pointer; margin-left: 90%">delete</i>';
        div += '<div class="divider"></div>';
        div += '</div>';

        $('#preguntas').append(div);
        $('.pregunta-nueva').show(300);
    });

    //Botones borrar opcion en editar quiz
    $(document).on('click', '.borrar-opcion', function (e) {
        var div = $(this).parent();
        var container = $(this).parents('.pregunta-container');
        var opcionesExistentes = $('.opcion', container).length + $('.opcion-agregada', container).length;
        if (opcionesExistentes > 2) {
            if(div.hasClass('opcion')){
                $('#opcionesBorradas', '#modal-editar-quiz').val($('#opcionesBorradas', '#modal-editar-quiz').val() + $('.opcion-id', div).val() + ',');
            }
            $(div, container).hide(200, function(){
                $(div, container).remove();
            });
        }
    });

    //Boton para borrar pregunta en editar quiz
    $(document).on('click', '.borrar-pregunta', function (e) {
        var preguntasExistentes = $('.pregunta-container').length;
        var preguntaContainer = $(this).parents('.pregunta-container');
        if (preguntasExistentes > 1) {
            if (!preguntaContainer.hasClass('pregunta-nueva')) {
                $('#preguntasBorradas', '#modal-editar-quiz').val( $('#preguntasBorradas','#modal-editar-quiz').val()+$('.pregunta-id',preguntaContainer).val()+',' );
            }
            $( preguntaContainer , '#modal-editar-quiz' ).hide(800, function () {
                $(this).remove();
            });
        }
    });

    //Método para cambiar la imagen
    $("#ruta_imagen", '#modal-nuevo-tema').on('change', function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#imagen-nuevo-tema")
                    .error(() => $("#imagen-nuevo-tema").attr("src", "../../img/ic_unknow.png"))
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    // Validacion del formulario para agregar un tema
    $("#form-nuevo-tema").validate({
        ignore: [],
        rules: {
            tema_titulo: "required",
            ruta_imagen: "required",
        },
        messages: {
            "titulo": "Este campo es obligatorio",
            "ruta_imagen": "Este campo es obligatorio"
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
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

    // Validacion del formulario para agregar un tema
    $("#form-editar-tema").validate({
        ignore: [],
        rules: {
            tema_titulo: "required",
        },
        messages: {
            "titulo": "Este campo es obligatorio",
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

    // Validacion del formulario para agregar uno o varios videos
    $("#form-agregar-video").validate({
        ignore: [],
        errorElement: 'div',
        errorPlacement: function(error, element) {
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

    // Validacion del formulario para editar un video
    $("#form-editar-video").validate({
        ignore: [],
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

    $('#form-editar-quiz').validate({
        ignore: [],
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