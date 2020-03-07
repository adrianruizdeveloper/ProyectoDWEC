<?php
include('../functions/connectPDO.php');

$db = pdo();
$db->exec('use peliculas;');
$request = $db->query('select * from peliculas');
while ($fila = $request->fetch(PDO::FETCH_ASSOC)) {
    echo "<div class='col-xs-12 col-md-6 col-lg-4 text-center pelicula'>";
    echo "<p class='title'>" . $fila["nombre_peli"] . "</p><br>";
    echo "<img  class='caratula' src='../images/" . $fila["id_peli"] . ".jpg'><br> ";
    echo "<a href='#' class='btn btn-secondary btn-lg active button-caratula' role='button'aria-pressed='true'>Compra ya!</a></div>";
}
?>
