$('#enviar_sala').click(function () {
    var nombre = $('#nombre_sala').val();
    var filas = $('#filas').val();
    var asientos_fila = $('#asientos_fila').val();
    var capacidad = filas * asientos_fila;
    $.ajax({
        url: "../assets/gets/addsala.php",
        type: "POST",
        data: {nombre: nombre, filas: filas, asientos_fila: asientos_fila, capacidad: capacidad},
        success: function (data) {
            //document.getElementById("peliculas").innerHTML=data;
            alertify.success('sala añadida');
            alert(data);
        }
    })
});