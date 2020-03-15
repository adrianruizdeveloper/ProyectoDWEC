$('#enviar_peli').click(function () {
    var nombre = $('#nombre_peli').val();
    var director = $('#nombre_director').val();
    var fecha = $('#fecha').val();
    var descripcion = $('#descripcion_peli').val();
    var restriccion = $('#edad_restriccion').val();
    var categoria = $('#categoria').val();
    var caratula = $('#caratula').val();

    $.ajax({
        url: "../assets/gets/addpeli.php",
        type: "POST",
        data: {nombre: nombre, director: director, fecha: fecha,descripcion: descripcion, restriccion: restriccion, categoria: categoria,
        caratula: caratula},
        success: function (data) {
            //document.getElementById("peliculas").innerHTML=data;
            alertify.success('Pelicula añadida');
        }
    })
});