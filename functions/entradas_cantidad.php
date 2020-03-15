<?php
    session_start();
    if (!isset($_SESSION['sess_user_id'])) {
        echo 'error';
    } else {
     $_SESSION['entradas_cantidad'] = $_POST['entrada'];
    }
