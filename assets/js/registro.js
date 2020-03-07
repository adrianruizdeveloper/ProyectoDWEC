$('#enviar_registro').click(function () {
    console.log("entra al ajax");
    var usuario_registro = $('#usuario_registro').val();
    var nombre_registro = $('#nombre_registro').val();
    var apellidos_registro = $('#apellidos_registro').val();
    var fecha_nac_registro = $('#fecha_nac_registro').val();
    var num_telf_registro = $('#num_telef_registro').val();
    var correo_registro = $('#correo_registro').val();
    var contrasena_registro = $('#myPassword').val();
    var contrasena_registro2 = $('#contrasena_registro2').val();
    var futbol_registro = $('#futbol_registro').val();
    var futbol_sala_registro = $('#futbol_sala_registro').val();
    var baloncesto_registro = $('#baloncesto_registro').val();
    var balonmano_registro = $('#balonmano_registro').val();
    $.ajax({
        url: "assets/gets/getregistro.php",
        type: "POST",
        data: {usuario_registro: usuario_registro, nombre_registro: nombre_registro,
        apellidos_registro: apellidos_registro, fecha_nac_registro: fecha_nac_registro,
        num_telf_registro: num_telf_registro, correo_registro: correo_registro,
        contrasena_registro: contrasena_registro,contrasena_registro2: contrasena_registro2,
        futbol_registro: futbol_registro, futbol_sala_registro: futbol_sala_registro,
        baloncesto_registro: baloncesto_registro, balonmano_registro: balonmano_registro},
        success: function (data){
            alert(data);
            if (data == 'OK') {
                $('#myModalregistro').hide();
                //location.reload();
            } else {
                //alert(data);
                document.getElementsByClassName("mensaje").text(data);
            }
        }
    });
});
