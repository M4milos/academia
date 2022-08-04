<?php

session_start();
require_once('../../classes/autoload.class.php');
require_once('../utils/utilidades.php');
    
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";

    if(empty($acao)){
        $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    }

    if ($acao == 'Entrar') {
        $logar = Login::Logar($email, $senha);
        $logar2 = Login::VerificaLogin($email, $senha);
    }
    if($acao == 'Sair'){
        $logar = Login::Deslogar();
        $logar2 = false;
    }

    if ($logar == true && $logar2 == true) {
        Index();
    }else{
        index();
    }

    if(!empty($_SESSION['nao_autenticado'])){
        if ($_SESSION['nao_autenticado'] == true) {
            Index();
        }
    }
    
?>