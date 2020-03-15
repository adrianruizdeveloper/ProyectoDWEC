<!DOCTYPE html>
<html>

<head>
    <title>Compra ticket</title>
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="../assets/js/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=250, initial-scale=1">
</head>

<body>
    <?php 
    include "../assets/conectors/conector.php";
    require "cabecera.php";
    cabecera('includes');
        $asientos = $_SESSION ["asiento_ocupado"];
        $id_sesion = $_SESSION ["sesion_selected"];
        
    //if( !( isset($_SESSION) ) ){

    //}else{
        try{
            $total_asientos = 0;

            $ticket_consulta = "select caratula, peliculas.nombre_peli, sesiones.fecha_sesion, sesiones.hora_sesion, sesiones.sala_sesion
                                from peliculas, sesiones
                                where id_sesion ='".$id_sesion."' and peliculas_id_peli = id_peli ";
           // $ticket = $db2->query($ticket_consulta);
           $ticket = $db2->query($ticket_consulta);
           foreach ($db2->query($ticket_consulta) as $ticket) {
            $hour = strtotime($ticket['hora_sesion']);
            $dia = strtotime($ticket['fecha_sesion']);

            $hour = date(' H:i', $hour);
            $dia = date("d-m-Y", $dia);
                echo "<div class='container body center text-center' > <div class='row text-center'> ";
                echo "
                <div class='col-md-12'>
                <h2>Cines Jaén</h2>
                    <div class='row'>
                        <div class='col-md-12'>
                        <br><br>
                            <div class='row'>
                                <div class='col-xs-12 col-md-6 col-lg-7'>
                                    <img src='../images/".$ticket['caratula']."' alt='imagen'>
                                </div>
                                <div class='col-xs-12 col-md-6 col-lg-5 '><br><br>
                                    <p>Pelicula: ".$ticket['nombre_peli']."</p>
                                    <p>Dia: ".$dia."</p>
                                    <p>Hora: ".$hour."</p>
                                    
                                    <p>Localidad: Jaén</p>

                                    <p>Información de los asiento </p>
                                    <p>Sala: ".$ticket['sala_sesion']."</p>

                                    ";
                    
                                    for($i=0; $i < sizeof($asientos)-1; $i++)
                                    {
                                        echo"<p>fila: ".$asientos[$i][0];

                                        for($f=1; $f < sizeof($asientos[$i]); $f++)
                                        {
                                            echo", asiento: ".$asientos[0][$f]."</p>";
                                            $total_asientos++;
                                        }
                                    }
                                    
                                    echo "
                                    <p>Precio total: ".($total_asientos*7)."€ (IVA incluido)</p>
                                    <label>
                                        <input type='checkbox' id='cbox1' value='first_checkbox'>
                                        Acepto los Términos y condiciones <br>
                                        Política de privacidad de cinesjaen.com
                                    </label>
                                    <p><input class='enviar_entrada btn btn-primary' type='button' value='Enviar al correo'>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div></div></div>";
            }
                  
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    //}
    require "pie.php";
    footer('index');
    
    ?>

</body>


</html>