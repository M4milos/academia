<?php

session_start();
require_once('../../classes/autoload.class.php');
require_once('../utils/utilidades.php');
    try {
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
        $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
        
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";

        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";

        if(empty($acao)){
            $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
        }

        if ($acao == 'Entrar') {
            $logar = Login::Logar($email, $senha);
           if ($logar) { 
                header("Location: ../index/inicial.php");
            }else{
                header("Location: ../index/index.php");
            }
        }

        if($acao == 'Sair'){
            if (!empty($_SESSION['usuario'])) {    
                echo "Saindo...";
                $logar = Login::Deslogar();
            }
            header("Location: ../index/index.php");
        }
        if($acao == 'Cadastrar'){

             //echo    "Nome: ".$nome."<br>
             //        Email: ".$email."<br>
              //       Cpf: ".$cpf."<br>
              //       Senha: ".$senha."<br>
              //       Tipo: ".$tipo;

            $cadastrar = new Login("",$nome, $email, $senha, $cpf, $tipo);

            $cadastrar->Salvar();
            if($cadastrar == true){
                header("Location: ../index/index.php");
            }
        }

        // if(!empty($_SESSION['nao_autenticado'])){
        //     if ($_SESSION['nao_autenticado'] == true) {
        //         Index();
        //     }
        // }
    } catch (Exception $e) {
        echo "Erro ao executar os comandos: ('{$e->getMessage()}')\n{$e}\n";
    }
    
  //8F*12Gsfu1xhvdJmxbXZ  
?>