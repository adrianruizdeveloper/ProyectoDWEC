<form name="registro">
    <div class="container">
        <div class="form-row">
            <div class="col-md-5">
                <div class="form-group">
                    <input class="form-control" type="text" id="usuario_registro" name="usuario_registro"
                           placeholder="Usuario" required>
                    <input class="form-control" type="text" id="nombre_registro" name="nombre_registro"
                           placeholder="Nombre" required>
                    <input class="form-control" type="text" id="apellidos_registro" name="apellidos_registro"
                           placeholder="Apellidos" required>
                    <input class="form-control" type="date" id="fecha_nac_registro" name="fecha_nac_registro"
                           placeholder="Fecha Nacimiento">
                    <input class="form-control" type="number" id="num_telef_registro" name="num_telef_registro"
                           placeholder="Numero de telefono">
                </div>
            </div>
            <div class="col-md-6 offset-md-1">
                <div class="form-group">
                    <input class="form-control" type="email" id="correo_registro" name="correo_registro"
                           placeholder="Correo electronico" required>
                    <input id="myPassword" class="form-control" type="password" name="contrasena_registro"
                           placeholder="Contraseña" required>
                    <input class="form-control" type="password" id="contrasena_registro2" name="contrasena_registro2"
                           placeholder="Repite Contraseña" required>
                </div>
            </div>
        </div>
    </div>
        <p style="text-align: center;"><button id="enviar_registro">Registro</button>
</form>

<span class="text-danger"><?php echo @$msg ?></span>
<script src=<?php echo $registrojs;?>></script>



