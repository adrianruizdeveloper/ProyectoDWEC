<?php
session_start();


    $fila_selected = $_POST['fila'];
    $asiento_selected = $_POST['asiento'];
    $limit_asientos = $_POST['limit_asientos'];
    $new_array_asientos2 = array(
        $fila_selected,
        $asiento_selected
    );
    $coincidencia = 'no coincidencia';
    $count = 0;
    $index_delete = 0;

    if (!isset($_SESSION['asiento_ocupado'])) {

        $_SESSION['asiento_ocupado'] = array(
            array(
                $fila_selected,
                $asiento_selected
            ),
        );
        echo 'creada';
    } else {

        $array_asientos = $_SESSION['asiento_ocupado'];
        foreach ($array_asientos as $fila) {
            if ($fila[0] == $new_array_asientos2[0] && $fila[1] == $new_array_asientos2[1]) {
                $coincidencia = 'coincidencia';
                $index_delete = $count;
            }
            $count++;
        }

        if ($coincidencia === 'no coincidencia') {

            if (sizeof($_SESSION['asiento_ocupado']) == $limit_asientos) {
                echo 'limite';
            } else {
                $new_array_asientos = array(
                    $fila_selected,
                    $asiento_selected
                );

                array_push(
                    $_SESSION['asiento_ocupado'],
                    $new_array_asientos
                );

                echo 'no_limit';
            }
        } else {

            unset($_SESSION['asiento_ocupado'][$index_delete]);
            echo 'coincidencia';
        }
    }
