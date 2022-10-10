<?php
    try{
        session_start();
        require_once('../../classes/autoload.class.php');
        require_once('../utils/utilidades.php');
    } catch (Exception $e) {
        echo "Erro ao executar os comandos: ('{$e->getMessage()}')\n{$e}\n";
    }   
 
    try {
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
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
           $final =  $logar = Login::Logar($email, $senha);
        }

        if($acao == 'Sair'){
            if (!empty($_SESSION['usuario'])) {    
                $final = $logar = Login::Deslogar();
            }
        }
        if($acao == 'Cadastrar'){
            $cadastrar = new Login("",$nome, $email, $senha, $cpf, $tipo);
            $final = $cadastrar->Salvar();
        }
        if ($acao == "Editar") {
            $editar = new Login($id,$nome,$email,$senha,$cpf,$tipo);
            $final = $editar->Editar();
        }
        if($final){
            header("Location: ../index/index.php");
        }
    } catch (Exception $e) {
        echo "Erro ao executar os comandos: ('{$e->getMessage()}')\n{$e}\n";
    }
?>