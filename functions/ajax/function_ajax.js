$("[id*=sesion]").on('click', function () {
    var sesion = $(this).attr('data_id_sesion');
    $.ajax({
        url: "functions/sesion_id_peli.php",
        type: "POST",
        data: { sesion: sesion },
        success: function (data) {
            // console.log(data)
            window.location.replace("includes/sesiones.php");
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

$(document).ready(function () {
    $("#boton_entradas").click(function () {
        var entrada = $('input#n_entradas').val();

        $.ajax({
            url: "../functions/entradas_cantidad.php",
            type: "POST",
            data: {
                entrada: entrada,
            },
            success: function (data) {
                // console.log(entrada);
                if(data == 'error'){
                    alert('Necesitas estar logueado');
                    
                }else if (entrada <= 10 && entrada > 0) {
                    // console.log('entra');
                    window.location.replace("reserva.php");
                } else {
                    // console.log('sale');
                    alert('La cantidad de entradas no puede ser mas de 10');
                }
            }
        });
    });
});

// $(document).ready(function () {
$(document).on('click', '#sesion_boton', function () {
    var sesion = $(this).attr('data_id_sesion');
    $.ajax({
        url: "functions/sesion_id_peli.php",
        type: "POST",
        data: { sesion: sesion },
        success: function (data) {
            // console.log(data)
            window.location.replace("includes/sesiones.php");
        }
    });
});
// });

$(document).ready(function () {
    $("#boton_reserva").click(function () {

        $.ajax({
            url: "../functions/check_sites.php",
            type: "POST",
            success: function (data) {
                // console.log('entrada');
                window.location.replace("compra.php");
            }
        });
    });
});
$(document).ready(function () {
    $("#enviar_entrada").click(function () {
        // console.log(data);
        var button = $("#enviar_entrada");
        $.ajax({
            url: "../functions/send_tickets.php",
            type: "POST",
            success: function (data) {
                $(button).replaceWith("<h1>Gracias por su compra!!</h1>");
            }
        });
    });
});

