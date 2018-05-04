$(function(){

    //Funcionalidad de los botones para eliminar una publicidad.
    $(".delete").click(function(){
        var btn = $(this),
            yesButton = null,
            id;
        $('#delete-modal').openModal();
        $("#id-eliminar").val(btn.data('id'));
    });

  

});
