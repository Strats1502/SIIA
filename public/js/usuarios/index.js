$(function(){

   /**
    * Funcionalidad de paginador.
    */
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        getUsuarios(page, $("#icon_search").val());

     });

     /**
      * Funcionalidad del ordenamiento.
      */
    $(document).on('click', '.header', function(e){   
        if(columna == $(this).data('field')){
            if(tipo == "asc"){
                tipo = "desc";
            }
            else{
                tipo = "asc";
            }
        }
        else {
            tipo ="asc";
        }
        columna = $(this).data('field')
    
        getUsuarios(1, $("#icon_search").val());
    });
    
    //Lógica de buscar.
    $("#icon_search").on("keyup paste change", function(e){
        getUsuarios(1, $(this).val())
    }) 
     
});
 
//Función para obtener usuarios (Búsqueda)
var xhr, columna = "usuario.id", tipo="asc";
function getUsuarios(page, q) {
    if(xhr){
        xhr.abort();
    }
    xhr = $.ajax({
        url: $("#_url").val() + '/usuarios/buscar',
        data: {
            page: page,
            q: q,
            columna: columna,
            tipo: tipo 
        }
    }).done(function(data) {
        $("#table").html(data);
    });
}

