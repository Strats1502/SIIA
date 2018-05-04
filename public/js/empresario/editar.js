$(function () {
    $('document').ready(function () {
        $('select').material_select();
    });

    $("#programa").on('change', function(){
        if($(this).val() === '1'){
            $("#tipo-programa").show();
        }
        else{
            $("#tipo-programa").hide();
            $("#id_programa_beneficiario").val("");
        }
    });

    $("#pueblo").on('change', function(){
        if($(this).val() === '1'){
            $("#tipo-pueblo").show();
        }
        else{
            $("#tipo-pueblo").hide();
            $("#id_pueblo_indigena").val("");
        }
    });

    $("#capacidad").on('change', function(){
        if($(this).val() === '1'){
            $("#tipo-capacidad").show();
        }
        else{
            $("#tipo-capacidad").hide();
            $("#id_capacidad_diferente").val("");
        }
    });

    $("#premio").on('change', function(){
        if($(this).val() === '1'){
            $("#tipo-premios").show();
        }
        else{
            $("#tipo-premios").hide();
            $("#premios").val("");
        }
    });

    $("#proyecto").on('change', function(){
        if($(this).val() === '1'){
            $("#proyectos").show();
            $("#economico").show();        
        }
        else{
            $("#proyectos").hide();
            $("#economico").hide();
            $("#proyectos_sociales").val("");
            $("#apoyo_proyectos_sociales").val("");
        }
    });

    $(".idiomabtn").on('click', function(){
        var html = $(".row-idioma")[0].outerHTML;
        $(".row-general").append(html);
    });

    $(document).on('click', '.borrar-idioma', function(){
        if ($(".row-idioma").length > 1) {
            $(this).closest("div.row").remove();
        } else {
            $("#idioma").val(null);
            $("#conversacion-input").val(null);
            $("#lectura-input").val(null);
            $("#escritura-input").val(null);
        }
    });
});

function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#image')
              .attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
  }
}