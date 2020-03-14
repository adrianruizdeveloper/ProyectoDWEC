<?php
function get_sesions_of_pelis($db, $id_peli)
{
    $dia_actual = date("Y-m-d");
    $query = 'SELECT * FROM sesiones where peliculas_id_peli = ' . $id_peli . ' and fecha_sesion = \'' . $dia_actual . '\'';
    $request = $db->query($query);
    // print $query;
    echo "<div class='row justify-content-center'>";
    while ($fila = $request->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='col-xs-3 col-md-2 col-lg-2 button_div_sesion'>";

        $hour_format = $date = strtotime($fila['hora_sesion']);
        $hour = date(' H:i', $hour_format);
        $hour_now = date(' H:i');
        $id_button = $hour . "_sesion";

        if ($hour_now <= $hour) {
            echo "<button id='" . $id_button . "' data_id_pelicula='" . $fila['peliculas_id_peli'] . "' data_id_sesion='" . $fila['id_sesion'] . "' class=' button-caratula btn btn-secondary btn-lg active ' role='button'aria-pressed='true'>" . $hour . '</button>';
        } else {
            echo "<button disabled id='" . $id_button . "' data_id_pelicula='" . $fila['peliculas_id_peli'] . "' data_id_sesion='" . $fila['id_sesion'] . "' class=' button-caratula btn btn-secondary btn-lg active ' role='button'aria-pressed='true'>" . $hour . '</button>';
        }
        echo "</div>";
    }
    echo "</div>";
}

function get_info_sesions_of_pelis($db, $sesion_pelicula)
{
    $db->exec('use peliculas;');
    $info_pelicula_sesion = $db->query("SELECT * FROM sesiones INNER JOIN peliculas ON sesiones.peliculas_id_peli = peliculas.id_peli where sesiones.id_sesion = '" . $sesion_pelicula . "'");
    $fila = $info_pelicula_sesion->fetch(PDO::FETCH_ASSOC);
    return $fila;
}

function pintar_asientos($db, $id_sesion, $n_asientos_r)
{
    $db->exec('use peliculas;');
    $a_ocupados = $db->query("SELECT * FROM asientos where sesion_asiento = " . $id_sesion . "");
    $asientos_ocupados = $a_ocupados->fetch(PDO::FETCH_ASSOC);
    $sesion_sala = $db->query("SELECT * FROM sesiones INNER JOIN salas on sesiones.sala_sesion = salas.id_sala where sesiones.id_sesion = " . $id_sesion);
    // $sesion_sala = $sesion_sala->fetch(PDO::FETCH_ASSOC);
    $n_fila = 0;
    $n_asientos = 0;
    foreach ($sesion_sala as $fila) {
        $n_fila = $fila['filas_sala'];
        $n_asientos = $fila['asientos_filas_sala'];
    }
    // print "nº asientos: " . $n_asientos . "<br>";
    // print "nº filas: " . $n_fila . "<br>";
    echo "<div class=' d-flex justify-content-center'>";
    echo "<table>";
    for ($i = 1; $i <= $n_fila; $i++) {
        echo "<tr>";
        // echo "<td class=''>F-" . $i . "</td>";
        for ($j = 1; $j <= $n_asientos; $j++) {
            //hacer query para generar la tabla según el estado
            // echo "<td ><a id='_asientos' data_id_asientos_r='" . $n_asientos_r . "' data_id_fila='" . $i  . "' data_id_asientos='" . $j. "' ><img src='../images/butacaVacia.gif'></a></td>";
            estado_asientos($db, $id_sesion, $i, $j, $n_asientos_r);
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}

function estado_asientos($db, $id_sesion, $fila, $asiento, $n_asientos_r)
{
    $estado = $db->query("SELECT count(*) FROM `asientos` WHERE fila_asiento =" . $fila . " and n_asiento = " . $asiento . " and sesion_asiento = " . $id_sesion);
    $request = $estado->fetch(PDO::FETCH_COLUMN);
    //1-libre, 2-reservado, 3-ocupado
    if (!$request) {
        echo "<td ><a id='_asientos' data_estado='1' data_asientos_limit='" . $n_asientos_r . "' data_id_fila='" . $fila  . "' data_id_asientos='" . $asiento . "' ><img src='../images/butacaVacia.gif'></a></td>";
    } else {
        echo "<td ><a id='_asientos' data_estado='3' data_asientos_limit='" . $n_asientos_r . "' data_id_fila='" . $fila  . "' data_id_asientos='" . $asiento . "' ><img src='../images/butacaOcupada.gif'></a></td>";
    }
}

// function pintar_info_pelicula($db, $id_sesion){
//     $estado = $db->query("SELECT count(*) FROM `asientos` WHERE fila_asiento =" . $fila . " and n_asiento = " . $asiento . " and sesion_asiento = " . $id_sesion);

// }
