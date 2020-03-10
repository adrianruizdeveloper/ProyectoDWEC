<?php
function get_sesions_of_pelis($db, $id_peli)
{
    $dia_actual = date("Y-m-d");
    $query = 'SELECT * FROM sesiones where peliculas_id_peli = ' . $id_peli . ' and fecha_sesion = \'' . $dia_actual . '\'';
    $request = $db->query($query);
    // print $query;
    while ($fila = $request->fetch(PDO::FETCH_ASSOC)) {

        $hour_format = $date = strtotime($fila['hora_sesion']);
        $hour = date(' H:i', $hour_format);
        $hour_now = date(' H:i');
        $id_button = $hour . "_sesion";

        if ($hour_now <= $hour) {
            echo "<button id='" . $id_button . "' data_id_pelicula='" . $fila['peliculas_id_peli'] . "' data_id_sesion=' " . $fila['id_sesion'] . "' class='btn btn-secondary btn-lg active button-caratula' role='button'aria-pressed='true'>" . $hour . '</button><br>';
        } else {
            echo "<button disabled id='" . $id_button . "' data_id_pelicula='" . $fila['peliculas_id_peli'] . "' data_id_sesion=' " . $fila['id_sesion'] . "' class='btn btn-secondary btn-lg active button-caratula' role='button'aria-pressed='true'>" . $hour . '</button><br>';
        }
    }
}
