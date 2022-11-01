<?php
    try{
        session_start();
        header('Content-Type: application/json');
        require_once('../../classes/autoload.class.php');
        require_once('../utils/utilidades.php');
    } catch (Exception $e) {
        echo "Erro ao executar os comandos: ('{$e->getMessage()}')\n{$e}\n";
    }   
 
    try {
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        if (empty($id)) {
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
        }
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
        $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";

        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
        if(empty($acao)){
            $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
        }

        if($acao == 'Entrar') {
            $entrar = $logar = Login::Logar($email, $senha);
                if ($entrar == true) {
                    $sair = true;
                }else{
                    $entrar = false;
                }
        }

        else if($acao == 'Sair'){
            if (!empty($_SESSION['usuario'])) {    
                $sair = $logar = Login::Deslogar();
            }
        }

        else if($acao == 'Cadastrar'){
            $cadastrar = new Login("",$nome, $email, $senha, $tipo);
            $sair = $cadastrar->Salvar();
        }

        else if ($acao == "Editar") {
            $editar = new Login($id,$nome,$email,$senha,$tipo);
            $final = $editar->Editar();
            $sair = false;
        }
        else if ($acao == "mudarNome") {
            $final = $_SESSION['usuario']['nome'];
            $sair = false;
        }
        else if($acao == "excluir"){
            $obj = Login::ListarUsuario(1,$id);
            
            $sair = new Login($obj[0]['id_usuario'],$obj[0]['nome'],$obj[0]['senha'],$obj[0]['email'],$obj[0]['id_funcao']);
            $sair->Excluir();
        }

        if($entrar == false){
            header("Location: ../index/cadastro.php?erro=1");
        }

        if($sair){
            header("Location: ../index/index.php");
        }

        if($final){
            echo json_encode($final);
        }

        else{
            echo "Impossível realizar sua ação de {$acao}";
        }

    } catch (Exception $e) {
        echo "Erro ao executar os comandos: ('{$e->getMessage()}')\n{$e}\n";
    }
?>

