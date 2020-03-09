<?php
include "../conectors/conector.php";
$msg = "";
//Se recoge los datos que introduce el usuario se guarda en una variable para que no se pueda usar la insercion sql
$usuario_registro = trim($_POST['usuario_registro']);
$nombre_registro = trim($_POST['nombre_registro']);
$apellidos_registro = trim($_POST['apellidos_registro']);
$correo_registro = trim($_POST['correo_registro']);
$contrasena_registro = trim($_POST['contrasena_registro']);
$contrasena_registro2 = trim($_POST['contrasena_registro2']);
$fecha_nac = $_POST['fecha_nac_registro'];
$fecha_nac = dateformat($fecha_nac);
$numero_telf_registro = trim($_POST['num_telef_registro']);
try{
//Se comprueba que la costraseña sea segura y iguales
if (strlen($contrasena_registro) < 8) {
    echo ("La costraseña tiene que tener 8 carácteres o más");
} else if ($contrasena_registro != $contrasena_registro2) {
    echo ("Las costraseñas tiene que ser iguales");
} else {
    $hora = date("Y-m-d H:i:s");
    $contrasena = password_hash($contrasena_registro, PASSWORD_DEFAULT);
    //Se encripta la contraseña
    $sql_contrasena = $db2->prepare("INSERT INTO contrasenas(contrasena_contra,fecha_modificacion) VALUES (:contrasena_contra,' $hora ');"); 
    $sql_contrasena->bindParam('contrasena_contra', $contrasena, PDO::PARAM_STR);
    $sql_contrasena->execute();
    $consulta_contrasena = "Select id_contrasena from contrasenas where contrasena_contra = \"$contrasena\" AND  fecha_modificacion = \"$hora\";";
    $idcontra = 0;
    foreach ($db2->query($consulta_contrasena) as $fila) {
        $idcontra =$fila['id_contrasena'];
    }
    //Se introduce los datos del usuario en la base de datos
    $sql_usuario = $db2->prepare("INSERT INTO usuarios(usuario_usu, rol_usu, nombre_usu,apellidos_usu,fechanac_usu, telefono_usu, correo_usu,idcontrasena_usu) VALUES (:usuario_registro,2,:nombre_registro,:apellidos_registro, :fecha_nac , :numero_telf , :correo_registro,$idcontra);");
    $sql_usuario->bindParam('usuario_registro', $usuario_registro, PDO::PARAM_STR);
    $sql_usuario->bindParam('nombre_registro', $nombre_registro, PDO::PARAM_STR);
    $sql_usuario->bindParam('apellidos_registro', $apellidos_registro, PDO::PARAM_STR);
    $sql_usuario->bindParam('fecha_nac', $fecha_nac, PDO::PARAM_STR);
    $sql_usuario->bindParam('numero_telf', $numero_telf_registro, PDO::PARAM_STR);
    $sql_usuario->bindParam('correo_registro', $correo_registro, PDO::PARAM_STR);
    $sql_usuario->execute();

    $query = "select usuario_usu,id_usu from usuarios where usuario_usu=:username";
    $stmt = $db2->prepare($query);
    $stmt->bindParam('username', $usuario_registro, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $usuario = $row['id_usu'];
    echo ("OK");
}    
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}

function dateformat($fecha)
{
    $fecha = strtotime($fecha);
    //Cambia el formato para que se pueda introducir en la base da datos
    return date(date('Y', $fecha) . "-" . date('m', $fecha) . "-" . date('d', $fecha));
}

?>

