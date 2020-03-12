$("[id*=sesion]").on('click', function() {
    var sesion = $(this).attr('data_id_sesion');
    $.ajax({
        url: "functions/sesion_id_peli.php",
        type: "POST",
        data: { sesion: sesion },
        success: function(data) {
            // console.log(data)
            window.location.replace("includes/sesiones.php");
        }
    });
});


$("[id*=asientos]").click(function () {
    var fila_ = $(this).attr('data_id_fila');
    var asiento_ = $(this).attr('data_id_asientos');
    var n_asientos_r = $(this).attr('data_id_asientos_r');
    var este = $(this);
    $.post("../functions/check_sites.php", {
        fila: fila_,
        asiento: asiento_
    }, function (data) {
        if(data == 1){
            // $(este).html("<img src='../images/butacaVacia.gif'></a>");
        }else{
            $(este).html("<img src='../images/butacaReservada.gif'></a>");

        }
        // console.log(data);
    });
});