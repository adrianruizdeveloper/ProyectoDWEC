function eliminar_sala(id){
    $.ajax({
        url: "../assets/gets/eliminar_sala.php",
        type: "POST",
        data: {id: id},
        success: function (data) {
            document.getElementById("salas").innerHTML=data;
            alertify.error('sala eliminada');
        }
    })
}