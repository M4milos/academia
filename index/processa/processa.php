<?php

session_start();
require_once('../../classes/autoload.class.php');
require_once('../utils/utilidades.php');
    try {
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";

        if(empty($acao)){
            $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
        }

        if ($acao == 'Entrar') {
            $logar = Login::Logar($email, $senha);
           if ($logar == true) {
               echo $_SESSION['usuario'];
            }
        }
        if($acao == 'Sair'){
            $logar = Login::Deslogar();
        }

        

        // if(!empty($_SESSION['nao_autenticado'])){
        //     if ($_SESSION['nao_autenticado'] == true) {
        //         Index();
        //     }
        // }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    
  //8F*12Gsfu1xhvdJmxbXZ  
?>