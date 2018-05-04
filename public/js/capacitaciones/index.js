$(function(){
    $('.borrar').click(function(){
        $('#id_capacitacion', '#modal-borrar').val( $(this).data('capacitacion-id') );
        $('#modal-borrar').openModal();
    });
});