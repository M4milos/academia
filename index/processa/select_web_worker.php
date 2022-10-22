<?php
    session_start();
    header('Content-Type: application/json');
        require_once('../../classes/autoload.class.php');
        
        $lista = Arduino::Listagem($tipo = 0, $info = "");
            
        if ($lista) {
            echo json_encode($lista);
        }else {
            echo "Nenhum registro encontrado";
        }
?>