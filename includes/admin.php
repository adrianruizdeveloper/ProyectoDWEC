<?php 
session_start();
    if($_SESSION['rol']!==1){
        header("location:../index.php");
    } else{
        ?>
<!DOCTYPE html>
<html>

<head>
    <title>Proyecto cine</title>
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/eliminar.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js">
    </script>
    <script src="../assets/js/alertify.js"></script>
    <link rel="stylesheet" href="../assets/css/alertify.css">
    <link rel="stylesheet" href="../assets/css/themes/bootstrap.css">

    <meta name="viewport" content="width=250, initial-scale=1">
    <?php
        include "../assets/conectors/conector.php";
        $lista = "";
        $consulta_pelis = "select id_peli, nombre_peli, fecha_peli, edad_restriccion from peliculas, tipos_restricciones where  restriccion_peli = id_restriccion  ";
        foreach ($db2->query($consulta_pelis) as $fila) {
                $id = $fila['id_peli'];
                $nombre = $fila['nombre_peli'];
                $fecha = $fila['fecha_peli'];
                $restriccion = $fila['edad_restriccion'];
                $lista .= '<tr id='.$id.'><th scope="row">'.$id.'</th><td>'.$nombre.'</td><td>'.$fecha.'</td><td>+'.$restriccion.'</td><td><button class="btn btn-info">Editar</button>&nbsp<button onclick="eliminar('.$id.')" class="btn btn-danger">Eliminar</button></td></tr>';
        }

    ?>
</head>

<body>
    <?php 
    require "cabecera.php";
    cabecera("admin");
    ?>
    <div class="container">
        <br>
        <p class="text-center">PELÍCULAS <button style="float: right;" data-toggle="modal" data-target="#myModalpeli" class="btn btn-info">Añadir +</button></p>
        
        <table class="table" id="lista_pelis">
            <thead>
                <tr class="text-center">
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">año</th>
                    <th scope="col">Restricción</th>
                    <th scope="col">Funciones</th>
                </tr>
            </thead>
            <tbody id="peliculas" class="text-center">
                <?php echo $lista; ?>
            </tbody>

        </table>


    </div>
</body>

<div class="modal" id="myModalpeli">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal"><span style="color: red;">X</span></i>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <?php include "anadir_peli.php" ?>
            </div>
        </div>
    </div>
</div>

<?php
    }
?>