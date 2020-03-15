<?php
    include "../conectors/conector.php";
    $id = $_POST['id'];
    $borrar_peli = "delete from salas where id_sala = ". $id;
    $db2->query($borrar_peli);

    $lista_sala = "";
    $consulta_sala = "select id_sala, nombre_sala, capacidad_sala, filas_sala, asientos_filas_sala from salas";
    foreach ($db2->query($consulta_sala) as $fila) {
            $id = $fila['id_sala'];
            $nombre = $fila['nombre_sala'];
            $capacidad = $fila['capacidad_sala'];
            $filas = $fila['filas_sala'];
            $asientos = $fila['asientos_filas_sala'];
            $lista_sala .= '<tr id='.$id.'><th scope="row">'.$id.'</th><td>'.$nombre.'</td><td>'.$capacidad.'</td><td>'.$filas.'</td><td>'.$asientos.'</td><td><button class="btn btn-info">Editar</button>&nbsp<button onclick="eliminar_sala('.$id.')" class="btn btn-danger">Eliminar</button></td></tr>';
    }
    echo $lista_sala;

?>