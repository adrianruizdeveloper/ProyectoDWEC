<?php
session_start();
    $asientos = $_SESSION['asiento_ocupado'];
    $id_sesion = $_SESSION["sesion_selected"];
    array_pop($asientos);
    include('connectPDO.php');
    $db = pdo();
    $db->exec('use peliculas;');
    foreach($asientos as $asiento){
        $query = "INSERT INTO asientos (sesion_asiento, fila_asiento, n_asiento) VALUES (" . $id_sesion .", " . $asiento[0] . ", "  . $asiento[1] . ")";
        echo $query;
        $db->exec($query);
    }
?>