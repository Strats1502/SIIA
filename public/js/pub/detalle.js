$(function() {

  
    if (moment($("#fecha-inicio").val()).format("DD MMMM, YYYY") != "Invalid date") {
        $("#fecha-inicio").val(moment($("#fecha-inicio").val()).format("DD MMMM, YYYY"));
    }
    if (moment($("#fecha-fin").val()).format("DD MMMM, YYYY") != "Invalid date") {
        $("#fecha-fin").val(moment($("#fecha-fin").val()).format("DD MMMM, YYYY"));
    }

    $(".datepicker").change(function() {
        $(this).val(moment($(this).val(), "DD MMMM, YYYY").format("DD MMMM, YYYY"))
    })

      //Validación de formulario para nueva publicidad
      $("#form-nuevo").validate({
        submitHandler: function(form) {
            $("#fecha-inicio").val(moment($("#fecha-inicio").val(), "DD MMM, YYYY").format("YYYY-MM-DD"));
            $("#fecha-fin").val(moment($("#fecha-fin").val(), "DD MMM, YYYY").format("YYYY-MM-DD"));
            form.submit();
        },
        ignore: [],
        rules: {
            titulo: {
                required: true
            },
            "fecha-inicio": {
                required: true
            },
            "fecha-fin": {
                required: true
            },
            url: {
                required: true
            },
            field_imagen: {
                required: true,
            }
        },
        messages: {
            titulo: {
                required: "Ingrese el título de esta publicidad"
            },
            "fecha-inicio": {
                required: "Este campo es obligatorio"
            },
            "fecha-fin": {
                required: "Este campo es obligatorio"
            },
            url: {
                required: "Este campo es obligatorio"
            },
            field_imagen: {
                required: "La imagen es obligatoria"
            }
        },
        errorElement : 'div',
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

    $("#imagen").change(function() {
        $("#field_imagen").val("imagen");
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
         {
            var reader = new FileReader();
    
            reader.onload = function (e) {
               $('#img_show').attr('src', e.target.result);
            }
           reader.readAsDataURL(input.files[0]);
        }
        else
        {
          $('#img_show').attr('src', '/assets/no_preview.png');
        }
    });

});