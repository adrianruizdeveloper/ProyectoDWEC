<!DOCTYPE html>
<html>

<head>
    <title>Proyecto cine</title>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="assets/js/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=250, initial-scale=1">
</head>

<body>
    <?php session_start();
    require "includes/cabecera.php";
    $dia_actual = date("d-m-Y");
    cabecera("index");
    ?>


    <div class="row text-center">
        <div class="container body center">
            <?php
            echo "<h1 class='text-center'>Sesiones: " . $dia_actual . "</h1>";

            ?>
            <div class="col-md-12">
                <div class="row">
                    <?php
                    include('functions/connectPDO.php');
                    include('functions/querys.php');
                    $db = pdo();
                    $dia_actual = date("Y-m-d");
                    $db->exec('use peliculas;');
                    $peliculas = $db->query("SELECT * FROM sesiones INNER JOIN peliculas ON sesiones.peliculas_id_peli = peliculas.id_peli where sesiones.fecha_sesion = '" . $dia_actual . "' group by peliculas_id_peli");
                    foreach ($peliculas as $fila) {
                        echo "<div class='col-xs-12 col-md-6 col-lg-3    text-center '>";
                        echo "<h4 class='title'>" . $fila["nombre_peli"] . "</h4>";
                        echo "<img  class='caratula' src='images/" . $fila["caratula"] . "'><br> ";
                        get_sesions_of_pelis($db, $fila["peliculas_id_peli"]);
                        echo "</div>";
                    }
                    ?>
                </div>
                <h1 class='text-center'>Proximas sesiones</h1>
                <div class="row">
                    <div class='col-md-12'>

                        <?php
                        include("sesiones_semanales.php");

                        ?>
                    </div>
                </div>
            </div>

            <!-- <div class="col-md-3 sidebar">
                <p>esto es el sidebar</p>
            </div> -->
        </div>
    </div>
    <?php

    // require "includes/sesiones_semanal.php"; 
    require "includes/pie.php";
    footer("index");
    ?>

</body>
<script src="functions/ajax/function_ajax.js"></script>
<script src="functions/ajax/dar_horas.js"></script>

</html>