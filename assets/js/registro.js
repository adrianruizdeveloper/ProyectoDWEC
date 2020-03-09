$('#enviar_registro').click(function () {
    console.log("entra al ajax");
    var usuario_registro = $('#usuario_registro').val();
    var nombre_registro = $('#nombre_registro').val();
    var apellidos_registro = $('#apellidos_registro').val();
    var fecha_nac_registro = $('#fecha_nac_registro').val();
    var num_telef_registro = $('#num_telef_registro').val();
    var correo_registro = $('#correo_registro').val();
    var contrasena_registro = $('#myPassword').val();
    var contrasena_registro2 = $('#contrasena_registro2').val();
    $.ajax({
        url: "assets/gets/getregistro.php",
        type: "POST",
        data: {usuario_registro: usuario_registro, nombre_registro: nombre_registro,
        apellidos_registro: apellidos_registro, fecha_nac_registro: fecha_nac_registro,
        num_telef_registro: num_telef_registro, correo_registro: correo_registro,
        contrasena_registro: contrasena_registro,contrasena_registro2: contrasena_registro2},
        success: function (data){
            alert(data);
            /*
            if (data == 'OK') {
                $('#myModalregistro').hide();
                console.log(data);
                alert(data);
                
            } else {
                alert(data);
                document.getElementsByClassName("error").text("Error al registrar");
            }*/
        }
    });
});
