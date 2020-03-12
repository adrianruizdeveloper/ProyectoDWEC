<?php
include "assets/conectors/conector.php";

try {
    /*consulta de las sesiones de peliculas del dia de hoy hasta dentro de una semana*/
    $query = "select id_peli, nombre_peli, descripcion_categoria , edad_restriccion,CURDATE(), caratula
                  from peliculas, tipos_categorias, tipos_restricciones, sesiones
                  where id_peli=peliculas_id_peli and categoria1_peli = id_categoria and restriccion_peli = id_restriccion
                  and fecha_sesion >= CURDATE() and fecha_sesion < CURDATE() + INTERVAL 7 DAY
                  group by nombre_peli
                  ORDER BY nombre_peli asc , fecha_sesion asc";
    $listado_peliculas = "";
    foreach ($db2->query($query) as $pelicula) {
        /*  muestra titulo peli, descripcion 
            <img src='images/".$pelicula["nombre_peli"].".jpg' alt='imagen'>*/
        $listado_peliculas .= "
        <div class='row'>
                <div class='col-xs-12 col-md-6 col-lg-4'>
                        <img src='images/" . $pelicula["caratula"] . "' alt='imagen' class='caratula'>
                </div>
                <div class='col-xs-12 col-md-6 col-lg-8'>
                    <h3 id='pelicula'>" . $pelicula["nombre_peli"] . "</h3>
                    <!--<p>Categoria principal: " . $pelicula["descripcion_categoria"] . "</p>-->
                    <!--<p>Edad: " . $pelicula["edad_restriccion"] . " años</p>-->
                    <select data-id='" . $pelicula["nombre_peli"] . "' id='fecha' name='fecha'>
                    <option value='Ninguno' selected='true' disabled='enable'>Selecione una fecha</option>";

        /* muestra las fechas de sesiones */
        $fechas = "select fecha_sesion from sesiones
                where peliculaS_id_peli = '" . $pelicula["id_peli"] . "'
                and fecha_sesion >= CURDATE() and fecha_sesion < CURDATE() + INTERVAL 7 DAY
                           group by fecha_sesion ORDER BY fecha_sesion asc";
        $fecha_sesion = "";
        foreach ($db2->query($fechas) as $fecha) {
            $fecha_sesion = $fecha["fecha_sesion"];
            $listado_peliculas .=  "
                        <option value=\"" . $pelicula["id_peli"] . "\" data-foo='" . $fecha["fecha_sesion"] . "'>" . $fecha["fecha_sesion"] . "</option>
                        ";
        }
        $listado_peliculas .=  "
                    </select>
                    <div id='" . $pelicula["id_peli"] . "'>
                     ";

        $listado_peliculas .=  "</div></div></div><br>";
    }
    echo $listado_peliculas;
    echo "</di>";
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}
?>