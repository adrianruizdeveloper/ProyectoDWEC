<?php
session_start();
    $sesion =  $_SESSION['sesion_selected'];
    $fila_selected = $_POST['fila'];
    $asiento_selected = $_POST['asiento'];
    include('../functions/connectPDO.php');
    $db = pdo();
    $db->exec('use peliculas;');
    $estado = 0;
    $return = 0;
    $estado = $db->query("SELECT count(*) FROM `asientos` WHERE fila_asiento =" . $fila_selected . " and n_asiento = " . $asiento_selected . " and sesion_asiento = " . $sesion);

    $request = $estado->fetch(PDO::FETCH_COLUMN);

    echo $request;
?>

