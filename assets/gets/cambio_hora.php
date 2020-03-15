<?php
session_start();
try {
    include_once "../conectors/conector.php";
    $nom_pelicula = $_POST['pelicula'];
    $fecha_sesion = $_POST['fecha'];

    $horas = "select hora_sesion, CAST( concat(fecha_sesion, ' ', hora_sesion) as datetime ), NOW(), id_sesion from sesiones, peliculas
                          where peliculas_id_peli = id_peli and nombre_peli= '" . $nom_pelicula . "' and
                          CAST( concat(fecha_sesion, ' ', hora_sesion) as datetime ) >= NOW() and
                          fecha_sesion='" . $fecha_sesion . "'";
    $listas = "";
    foreach ($db2->query($horas) as $hora) {
        $hour_format = $date = strtotime($hora['hora_sesion']);
        $hour = date('H:i', $hour_format);
        $id_button = $hour . "_sesion";
        $hour_now = date('H:i');
        $day_now = date('Y-m-d');
        // $listas = ;
            $listas .= "<button id='sesion_boton' data_id_sesion='" . $hora['id_sesion'] .
                "' class=' button-caratula btn btn-secondary btn-lg active ' role='button'aria-pressed='true'>" . $hour . "</button> &nbsp";
    }
    if($listas == ""){
        echo "no hay Sesiones";
    }else{
        echo $listas;
    }
} catch (PDOException $e) {
    echo "ss Error : " . $e->getMessage();
}
