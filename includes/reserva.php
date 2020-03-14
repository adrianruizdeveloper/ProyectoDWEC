<!DOCTYPE html>
<html>

<head>
    <title>Proyecto cine</title>
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="../assets/js/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=250, initial-scale=1">
</head>

<body>
    <?php session_start();
    if (isset($_SESSION['asiento_ocupado'])) {
        unset($_SESSION['asiento_ocupado']);
    }

    $sesion_pelicula = $_SESSION['sesion_selected'];
    $n_asientos = $_SESSION['entradas_cantidad'];
    // $sesion_pelicula = 1;
    // $n_asientos = 3;
    require "cabecera.php";
    cabecera('includes');
    include('../functions/connectPDO.php');
    include('../functions/querys.php');
    $db = pdo();
    $info = get_info_sesions_of_pelis($db, $sesion_pelicula);
    ?>


    <div class="container body center">
        <div class="row text-center">
            <div class="container">


                <div class="card">
                    <div class="row">
                        <aside class="col-sm-5 border-right">
                            <article class="gallery-wrap">
                                <div class="img-big-wrap">
                                    <div class="center">
                                        <?php
                                        echo "<a href='#'><img src=../images/" . $info['caratula'] . " class='productos prod_LPS'></a>";

                                        ?>

                                    </div>
                                </div> <!-- slider-product.// -->
                                <div class="img-small-wrap">

                                </div> <!-- slider-nav.// -->
                            </article> <!-- gallery-wrap .end// -->
                        </aside>
                        <aside class="col-sm-7">
                            <article class="card-body p-5">
                                <!-- pintar asientos -->
                                <?php
                                pintar_asientos($db,  $sesion_pelicula, $n_asientos);
                                ?>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2 p-0">
                                        <dl class="param param-inline">
                                            <dt class="text-left">Cantidad: </dt>
                                            <dd>


                                            </dd>
                                        </dl>
                                    </div>
                                    <div class="col-md-5">
                                        <?php
                                        echo  "<input disabled class='form-control form-control-sm text-cente' style='width:70px;' value='" . $n_asientos . "'/>"
                                        ?>
                                    </div>
                                    <!-- <div class="col-sm-7">
                                        <dl class="param param-inline">
                                            <dt class="text-left">Idioma: </dt>
                                            <dd>
                                                <select class="form-control form-control-sm" style="width:100px;">
                                                    <option> Español </option>
                                                    <option> Ingles </option>
                                                    <option> Frances </option>
                                                </select>
                                            </dd>
                                        </dl>
                                    </div>  -->
                                </div> <!-- row.// -->
                                <hr>
                                <button id="boton_reserva" class="btn btn-lg btn-primary text-uppercase"> comprar </button>
                                <!-- <a href="#" class="btn btn-lg btn-outline-primary text-uppercase"> Añadir al carrito </a> -->
                            </article> <!-- card-body.// -->
                        </aside> <!-- col.// -->
                    </div> <!-- row.// -->
                </div> <!-- card.// -->


            </div>
        </div>
    </div>
    <?php

    require "pie.php";
    footer('index');
    ?>

</body>
<script src="../functions/ajax/function_ajax.js"></script>

</html>