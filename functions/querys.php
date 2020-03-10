<?php
function get_sesions_of_pelis($db, $id_peli)
{
    $dia_actual = date("Y-m-d");
    $query = 'SELECT * FROM sesiones where peliculas_id_peli = ' . $id_peli . ' and fecha_sesion = \'' . $dia_actual . '\'';
    $request = $db->query($query);
    // print $query;
    print "<h5 class='title text-center'>" . $dia_actual . "</h5><br>";
    while ($fila = $request->fetch(PDO::FETCH_ASSOC)) {

        $hour_format = $date = strtotime($fila['hora_sesion']);
        $hour = date(' H:i', $hour_format);
        echo "<a href='#' class='btn btn-secondary btn-lg active button-caratula' role='button'aria-pressed='true'>" . $hour . '</a><br>';
    }
}
