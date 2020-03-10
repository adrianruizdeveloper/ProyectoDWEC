$("[id*=sesion]").on('click', function() {
    var sesion = $(this).attr('data_id_sesion');
    $.ajax({
        url: "functions/sesion_id_peli.php",
        type: "POST",
        data: { sesion: sesion },
        success: function(data) {
            window.location.replace("includes/sesiones.php");
        }
    });
});