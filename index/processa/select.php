<?php
    session_start();
    header('Content-Type: application/json');
    require_once('../../classes/autoload.class.php');

    $lista = Login::ListarUsuario($tipo = 1, $info = $_SESSION['usuario']['id']);
    if ($lista) {
        echo json_encode($lista);
    }else {
        echo "Nenhum registro encontrado";
    }
?>