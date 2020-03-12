$('#button-login').click(function () {
    var username = $('#username').val();
    var password = $('#password').val();
        $.ajax({
            url: "assets/gets/getcontacto.php",
            type: "POST",
            data: {username: username, password: password},
            success: function (data) {
                alert(data);
                if (data == 'error') {
                    document.getElementsByClassName("error").text("Error en usuario o contraseña");
                } else {
                    //$('#myModallogin').hide();
                    location.reload();
                }
            }
        });
});
