<?php
    session_start();
    header('Content-Type: application/json');
    require_once('../../classes/autoload.class.php');
    
    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";if(empty($acao)){$acao = isset($_GET['acao']) ? $_GET['acao'] : "";}
    if($id){
        $lista = Login::ListarUsuario($tipo = 1, $info = $id);
        
    }

    if($acao == "Selecionar"){
        $lista = Login::ListarUsuario($tipo = 1, $info = $_SESSION['usuario']['id']);
        var_dump($lista);
    }
    if ($lista) {
        echo json_encode($lista);
    }else {
        echo "Nenhum registro encontrado";
    }
?>