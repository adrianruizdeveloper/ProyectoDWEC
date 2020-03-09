<?php
session_start();
include "../conectors/conector.php";
if (isset($_POST["username"])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    try {
        $query = "select usuario_usu ,id_usu,contrasena_contra from usuarios, contrasenas where usuario_usu=:username and idcontrasena_usu = id_contrasena";
        $stmt = $db2->prepare($query);
        $stmt->bindParam('username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($count == 1 && !empty($row) && password_verify($password, $row['contrasena_contra'])) {

            $_SESSION['sess_user_id'] = $row['id_usu'];
            $_SESSION['sess_user_name'] = $row['usuario_usu'];
            $_SESSION['conectado'] = true;
            setcookie("usuario", $_SESSION['sess_user_name']);
            echo "OK";
        } else {
            echo 'error';
        }
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }
}
?>