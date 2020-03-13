$("[id*=sesion]").on('click', function () {
    var sesion = $(this).attr('data_id_sesion');
    $.ajax({
        url: "functions/sesion_id_peli.php",
        type: "POST",
        data: { sesion: sesion },
        success: function (data) {
            // console.log(data)
            window.location.replace("includes/reserva.php");
        }
    });
});


$("[id*=asientos]").click(function () {
    var fila_ = $(this).attr('data_id_fila');
    var asiento_ = $(this).attr('data_id_asientos');
    var estado_asiento = $(this).attr('data_estado');
    var limit_asientos = $(this).attr('data_asientos_limit');
    var este = $(this);
    $.post("../functions/check_sites.php", {
        fila: fila_,
        asiento: asiento_,
        limit_asientos: limit_asientos,
    }, function (data) {
        if (estado_asiento == 3) {

        } else {
            if (data == 'creada' || data == 'no_limit') {
                if (estado_asiento == 1) {
                    $(este).html("<img src='../images/butacaReservada.gif'></a>");
                    $(este).attr("data_estado", "2");
                } else if (estado_asiento == 2) {
                    $(este).html("<img src='../images/butacaVacia.gif'></a>");
                    $(este).attr("data_estado", "1");
                }
                // console.log('no_limite')
            } else if (data == 'coincidencia') {
                $(este).html("<img src='../images/butacaVacia.gif'></a>");
                $(este).attr("data_estado", "1");
            }
            // console.log(data);
        }
    });
});