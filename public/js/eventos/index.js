$(function() {
    /**
     * Función index para eliminar
     */
    $(".delete").click(function() {
        var btn = $(this),
            yesButton = null,
            id;
            console.log(btn.data('id'))
        $('#deleteModalEv').openModal();
        $("#id-eliminar").val(btn.data('id'));
    });

});