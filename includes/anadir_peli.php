<?php 
    include "../assets/conectors/conector.php";
    $consulta_restriccion = "Select * from tipos_restricciones";
    $lista_restric = "";
    foreach ($db2->query($consulta_restriccion) as $fila) {
        $id_restric = $fila['id_restriccion'];
        $edad_restric= $fila['edad_restriccion'];
        $lista_restric .= '<option value="'.$id_restric.'">+'.$edad_restric.'</option> ';

    $consulta_cat = "Select * from tipos_categorias";
    $lista_cat = "";
    foreach ($db2->query($consulta_cat) as $fila) {
        $id_cat = $fila['id_categoria'];
        $tipo_cat= $fila['descripcion_categoria'];
        $lista_cat .= '<option value="'.$id_cat.'">'.$tipo_cat.'</option> ';
    }
}
?>
<form name="peli">
    <div class="container">
        <div class="form-row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Título</label>
                    <input class="form-control" type="text" id="nombre_peli" name="nombre_peli" required>
                    <label>Director</label>
                    <input class="form-control" type="text" id="nombre_director" name="nombre_director" required>
                           <label>Descripción</label>
                    <textarea class="form-control" type="text-area" id="descripcion_peli" name="descripcion_peli" required></textarea> 
                </div>
            </div>
            <div class="col-md-6 offset-md-1">
                <div class="form-group">
                <label>Año</label>
                    <input class="form-control" type="number" id="fecha" name="fecha" required>
                <label>Restricción</label>
                  <select class="form-control" name="edad_restriccion" id="edad_restriccion"><?php echo $lista_restric ?></select>
                <label>categoría</label>
                  <select class="form-control" name="categoria" id="categoria"><?php echo $lista_cat ?></select>
                  <label>Caratula</label>
                    <input class="form-control" type="text" id="caratula_peli" name="caratula_peli" required>
                </div>
            </div>
        </div>
    </div>
        <p style="text-align: center;"><button id="enviar_peli">Añadir película</button>
</form>
<script src="../assets/js/anadir_peli.js"></script>
