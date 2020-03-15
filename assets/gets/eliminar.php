<?php
    include "../conectors/conector.php";
    $id = $_POST['id'];
    $borrar_peli = "delete from peliculas where id_peli = ". $id;
    $db2->query($borrar_peli);

        $lista = "";
    $consulta_pelis = "select id_peli, nombre_peli, fecha_peli, edad_restriccion from peliculas, tipos_restricciones where  restriccion_peli = id_restriccion  ";
    foreach ($db2->query($consulta_pelis) as $fila) {
            $id = $fila['id_peli'];
            $nombre = $fila['nombre_peli'];
            $fecha = $fila['fecha_peli'];
            $restriccion = $fila['edad_restriccion'];
            $lista .= '<tr id='.$id.'><th scope="row">'.$id.'</th><td>'.$nombre.'</td><td>'.$fecha.'</td><td>+'.$restriccion.'</td><td><button class="btn btn-info">Editar</button>&nbsp<button onclick="eliminar('.$id.')" class="btn btn-danger">Eliminar</button></td></tr>';
    }
    echo $lista
?>