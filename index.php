<!DOCTYPE html>
<html>

<head>
    <title>Proyecto cine</title>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <script src="assets/js/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
        integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</head>
<body>
    <?php session_start();
    require "includes/cabecera.php"?>

        <div class="container body center">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-4 text-center pelicula">
                    <p class="title">{{Titulo-película}}</p>
                    <img src="images/avesdepresaylafantabulosa.jpg" class="caratula"><br>
                    <a href="#" class="btn btn-secondary btn-lg active button-caratula" role="button"
                        aria-pressed="true">Compra ya!</a>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4 text-center pelicula">
                    <p class="title">{{Titulo-película}}</p>
                    <img src="images/adu.jpg" class="caratula"><br>
                    <a href="#" class="btn btn-secondary btn-lg active button-caratula" role="button"
                        aria-pressed="true">Compra ya!</a>

                </div>
                <div class="col-xs-12 col-md-6 col-lg-4 text-center pelicula">
                    <p class="title">{{Titulo-película}}</p>
                    <img src="images/especiales.jpg" class="caratula"><br>
                    <a href="#" class="btn btn-secondary btn-lg active button-caratula" role="button"
                        aria-pressed="true">Compra ya!</a>
                </div>
            </div>
        </div>
        
    <?php require "includes/pie.php" ?>
</body>

</html>