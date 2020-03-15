$(document).ready( function () {
    $('#lista_pelis').DataTable({
        "ordering": false
    });
} );

function eliminar(id){
    $.ajax({
        url: "../assets/gets/eliminar.php",
        type: "POST",
        data: {id: id},
        success: function (data) {
            document.getElementById("peliculas").innerHTML=data;
            alertify.error('Pelicula eliminada');
        }
    })
}