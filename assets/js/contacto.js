$('#enviar_contacto').click(function () {
    var nombre = $('#nombre_contacto').val();
    var correo = $('#correo_contacto').val();
    var mensaje = $('#mensaje_contacto').val();
        $.ajax({
            url: "assets/gets/getcontacto.php",
            type: "POST",
            data: {nombre: nombre, correo: correo, mensaje: mensaje},
            success: function (data) {
            }
        });
});
