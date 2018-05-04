$(document).ready(function() {
    //Configuración para generar el SideNav
    $(".button-collapse").sideNav();

    //Configuración para abrir modal
    $('.modal-trigger').leanModal();

    //Configuración del datePicker
    $('.datepicker').pickadate({
        labelMonthNext: 'Siguiente',
        labelMonthPrev: 'Anterior',
        labelMonthSelect: 'Selecciona un mes',
        labelYearSelect: 'Selecciona un año',
        monthsFull: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
        weekdaysLetter: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
        today: 'Hoy',
        clear: 'Limpiar',
        close: 'Cerrar',
        format: "dd/mm/yyyy",
        modal: false
    });

    //Configuración del TimePicker
    $('.timepicker').lolliclock({
        autoclose: true,
        hour24: true
    });

    if (moment($("#fecha-inicio").val()).format("DD MMMM, YYYY") != "Invalid date") {
        $("#fecha-inicio").val(moment($("#fecha-inicio").val()).format("DD MMMM, YYYY"));
    }
    if (moment($("#fecha-fin").val()).format("DD MMMM, YYYY") != "Invalid date") {
        $("#fecha-fin").val(moment($("#fecha-fin").val()).format("DD MMMM, YYYY"));
    }

    if (location.href.includes("nuevo")) {
        $("#hora-inicio").val("");
        $("#hora-fin").val("");
    }

    //Necesario para sustituir el select común de HTML5 por el de Materialize
    $('select').material_select();

    //Se ejecuta al darle click al botón de más, permite configurar la acción a 'create'
    /*$('#new-event').on('click', function(){
      action = 'create';
      id = null;
      limpiarCampos();
    });*/

    // for HTML5 "required" attribute
    $("select[required]").css({
        display: "inline",
        height: 0,
        padding: 0,
        width: 0
    });

    $(".vald").change(function() {
        $(this).removeClass("invalid");
    });


    $('#tipo-evento').on('change', function() {
        $('#tipo-seleccionado').val($('#tipo-evento').val());
    });


    //Verificar datos y guardar el evento
    $('#guardar-evento').on('click', function() {
        var titulo = $('#titulo').val();
        var descripcion = $('#descripcion').val();
        var puntos = $('#puntos-otorgados').val();
        var area = $('#area_id').val();
        var tipo_evento = $('#tipo-seleccionado').val();
        var fecha_inicio = $('#fecha-inicio').val();
        var fecha_fin = $('#fecha-fin').val();
        var hora_inicio = $('#hora-inicio').val();
        var hora_fin = $('#hora-fin').val();
        var tipo_evento = $("#tipo-evento").val();
        var evaluar_fecha = false;

        if (titulo == '' || titulo == null) {
            $('#titulo').addClass('invalid');
        } else {
            $('#titulo').removeClass('invalid');
        }

        if (descripcion == '' || descripcion == null) {
            $('#descripcion').addClass('invalid');
        } else {
            $('#descripcion').removeClass('invalid');
        }

        if (puntos == '' || puntos == null) {
            $('#puntos-otorgados').addClass('invalid');
        } else {
            $('#puntos-otorgados').removeClass('invalid');
        }

        if (area == '' || area == null) {
            $('#area-responsable').addClass('invalid');
        } else {
            $('#area-responsable').removeClass('invalid');
        }

        if (tipo_evento == '0') {
            $('#tipo-evento').addClass('invalid');
        } else {
            $('#tipo-evento').removeClass('invalid');
        }

        if (fecha_inicio == '' || fecha_inicio == null) {
            $('#fecha-inicio').addClass('invalid');
            evaluar_fecha = false;
        } else {
            $('#fecha-inicio').removeClass('invalid');
            evaluar_fecha = true;
        }

        if (fecha_fin == '' || fecha_fin == null) {
            $('#fecha-fin').addClass('invalid');
            evaluar_fecha = false;
        } else {
            $('#fecha-fin').removeClass('invalid');
            evaluar_fecha = true;
        }

        if (hora_inicio == '' || hora_inicio == null) {
            $('#hora-inicio').addClass('invalid');
            evaluar_fecha = false;
        } else {
            $('#hora-inicio').removeClass('invalid');
            evaluar_fecha = true;
        }

        if (hora_fin == '' || hora_fin == null) {
            $('#hora-fin').addClass('invalid');
            evaluar_fecha = false;
        } else {
            $('#hora-fin').removeClass('invalid');
            evaluar_fecha = true;
        }

        var mensaje_fecha = false;
        if (evaluar_fecha) {
            if (fecha_inicio == fecha_fin) {
                if (hora_fin < hora_inicio || hora_inicio == hora_fin) {
                    $('#hora-inicio').addClass('invalid');
                    $('#hora-fin').addClass('invalid');
                    Materialize.toast('La hora de finalización debe ser mayor a la hora de inicio', 3000, 'red');
                    mensaje_fecha = true;
                }
            } else if (moment(fecha_inicio, "DD MMM, YYYY").isAfter(moment(fecha_fin, "DD MMM, YYYY"))) {
                $('#fecha-inicio').addClass('invalid');
                $('#fecha-fin').addClass('invalid');
                Materialize.toast('La fecha de finalización debe ser mayor a la fecha de inicio', 3000, 'red');
                mensaje_fecha = true;
            }
        }

        var valido = $('#form-nuevo-evento').find('.invalid').length;
        if (valido == 0) {
            $('#form-nuevo-evento').submit();
        } else if (!mensaje_fecha) {
            Materialize.toast('Llena todos los campos', 3000, 'red');
        }
    });

    


    //Método para cambiar la imagen
    $("#imagen").on('change', function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#img-evento")
                    .error(() => $("#img-evento").attr("src", "../../img/ic_unknow.png"))
                    .attr('src', e.target.result)
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    $("#imagen").change(function() {
        $("#img-evento").attr('src', $(this).val());
    });

    $(document).on('change', ".input-file-nuevo, .input-doc-file", function(event) {

        var span = $(this).parent().find('span'),
            fileName = $(this).val(),
            ext = fileName.split('.').pop(),
            img = $($(this).parent().parent().parent().find('img'));


        switch (ext) {

            case "pdf":
                img.attr('src', '../../img/ic_pdf.png');
                break;
            case "doc":
            case "docx":
                img.attr('src', '../../img/ic_doc.png');
                break;
            case "xlsx":
            case "xls":
                img.attr('src', '../../img/ic_xls.png');
                break;
            default:
                img.attr('src', '../../img/ic_unknow.png');
                break;

        }
        span.html("Cambiar");
    });

    //Funcionalidad de botón eliminar
    $(".delete-doc").click(function(event) {
        var elem = $(this).parent().parent().parent(),
            id = $(this).data('id');
        $("#deleteModalDoc").openModal();

        /**
         * Se asigna el evento al botón de yes para
         */
        $("#yesBtn").unbind()
            .click({
                elem: elem,
                id: id
            }, function(event) {
                var arrIds = JSON.parse($("#input-deleted-docs").val());
                arrIds.push(id);
                $("#input-deleted-docs").val(JSON.stringify(arrIds));
                event.data.elem.remove();
                $("#deleteModalDoc").closeModal();
            });
    });

    //Funcionalidad de botón eliminar en nuevos
    $(document).on('click', '.delete-doc-nuevo', function(event) {
        var elem = $(this).parent().parent().parent();
        $("#deleteModalDoc").openModal();

        /**
         * Se asigna el evento al botón de yes para
         */
        $("#yesBtn").unbind()
            .click({
                elem: elem
            }, function(event) {
                event.data.elem.remove();
                $("#deleteModalDoc").closeModal();
            });
    });

    var counter = 0;

    //Funcionalidad de botón Agregar documento
    $("#agregar-documento").click(function() {
        var section = $("<div class='section'/>"),
            row = $("<div class='row'/>"),
            img = $("<div class='col m2 hide-on-small-and-down'/>"),
            spanImg = $("<span class='col l12 center-align'>"),
            divTitulo = $("<div class='input-field col s5 l6'/>"),
            divFile = $("<div class='file-field input-field col s5 m3 l2'/>"),
            divX = $("<div class='col s2'/>"),
            spanX = $("<span class='col s12 center-align'>");

        //Se agrega la imagen al div img;
        spanImg.append('<img src="../../img/ic_unknow.png" alt="">');
        img.append(spanImg);
        //Se agrega input y label de título
        divTitulo
            .append(`<input class="doc-titulo-nuevo" name="doc-titulo-nuevo[${counter}]" type="text" value=""  class="validate">`)
            .append('<label for="titulo">Título</label>');
        //Se agregan los inputs de archivo
        divFile.append(`
           <div class="btn accent-color">
                <span>Agregar</span>
            <input type="file" class="input-file-nuevo" name="input-doc-file[${counter}]" ></div>`);
        //El div para cerrar
        spanX.append(`
           <a class="large center center-align delete-doc grey-text" style="margin-top:30px; cursor: pointer" ><i class="material-icons">delete</i></a> 
        `);
        divX.append(spanX);

        row.append(img)
            .append(divTitulo)
            .append(divFile)
            .append(divX);

        section.append(row);

        counter++;

        //Se agrega el documento al HTML container
        $("#doc-container").append(section);

        //Método utilizado para validar los inputs file.
        $(".input-file-nuevo").each(function() {
            $(this).rules("add", {
                required: true,
                messages: {
                    required: "Cargar el archivo es obligatorio. "
                }

            });
        });

    });



    $(document).on('change', ".input-file-nuevo, .input-doc-file", function(event) {

        var span = $(this).parent().find('span'),
            fileName = $(this).val(),
            ext = fileName.split('.').pop(),
            img = $($(this).parent().parent().parent().find('img'));


        switch (ext) {

            case "pdf":
                img.attr('src', '../../img/ic_pdf.png');
                break;
            case "doc":
            case "docx":
                img.attr('src', '../../img/ic_doc.png');
                break;
            case "xlsx":
            case "xls":
                img.attr('src', '../../img/ic_xls.png');
                break;
            default:
                img.attr('src', '../../img/ic_unknow.png');
                break;

        }
        span.html("Cambiar");
    });


});