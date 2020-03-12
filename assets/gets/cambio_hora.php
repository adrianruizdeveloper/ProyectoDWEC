<?php
session_start();
try{
include_once "../conectors/conector.php";
$nom_pelicula = $_POST['pelicula'];
$fecha_sesion = $_POST['fecha'];

                          $horas = "select hora_sesion, CAST( concat(fecha_sesion, ' ', hora_sesion) as datetime ), NOW() from sesiones, peliculas
                          where peliculas_id_peli = id_peli and nombre_peli= '".$nom_pelicula."' and
                          CAST( concat(fecha_sesion, ' ', hora_sesion) as datetime ) >= NOW() and
                          fecha_sesion='".$fecha_sesion."'";
                          $listas = "";
                          foreach ($db2->query($horas) as $hora) {
                            $listas .="<li id=\"". $hora["hora_sesion"] ."\">".$hora["hora_sesion"]."</li>";
                        }
                        echo $listas;
                    } catch (PDOException $e) {
                        echo "ss Error : " . $e->getMessage();
                    }


?>