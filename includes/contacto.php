<form name="contacto">
    <div class="container">
        <div class="form-row">
            <input class="form-control" type="text" id="nombre_contacto" name="nombre_contacto"
                           placeholder="Nombre" required>
            <input class="form-control" type="email" id="correo_contacto" name="correo_contacto"
                           placeholder="Correo electronico" required>
            <textarea class="form-control" type="text-area" id="mensaje_contacto" name="mensaje_contacto"
                            placeholder="Introduce tu mensaje" required></textarea> 
        </div>
    </div>
    <p style="text-align: center;"><button id="enviar_contacto">Registro</button>
    <script src=<?php echo $contactojs;?>></script>
</form>