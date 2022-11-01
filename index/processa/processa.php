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
        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
        if(empty($acao)){
            $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
        }
        $tabela = isset($_GET['tabela']) ? $_GET['tabela'] : "";
        if($acao != "Treino"){
            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
            $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
            $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";
        }
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        if (empty($id)) {
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
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
            $cadastrar->Salvar();
            $sair = $login = Login::Logar($email,$senha);
        }

        else if ($acao == "Editar") {
            $editar = new Login($id,$nome,$email,$senha,$tipo);
            $final = $editar->Editar();
            $sair = false;
            $entrar = true;
            $saida = false;
        }

        else if ($acao == "mudarNome") {
            $final = $_SESSION['usuario']['nome'];
            $sair = false;
        }

        else if($acao == "excluir"){
            if ($tabela == 'usuario') {
                $obj = Login::ListarUsuario(1,$id);
            
                $saida = new Login($obj[0]['id_usuario'],$obj[0]['nome'],$obj[0]['senha'],$obj[0]['email'],$obj[0]['id_funcao']);
                $saida->Excluir();
            }else if($tabela == 'treino'){
                $obj = Treino::Listar(1,$id);
                
                // var_dump($obj);
                // die();

                $saida = new Treino($obj[0]['id_treino'],$obj[0]['treino_repeticao'],$obj[0]['treino_tipo'],$obj[0]['id_usuario']);

                $saida->Excluir();

                header("Location: ../index/painel.php");
                die();
            }
            
        }
        else if($acao == "Treino"){
            $rep = isset($_POST['treino_repeticao']) ? $_POST['treino_repeticao'] : ""; 
            $tip = isset($_POST['treino_tipo']) ? $_POST['treino_tipo'] : ""; 
            $usu = isset($_POST['tipo']) ? $_POST['tipo'] : "";
            // echo "Repetição: ".$rep. " Tipo: ". $tip ." Usuario: ". $usu;
            // die();
            $obj = new Treino(null,$rep,$tip,$usu);
            $sair = $obj->Salvar();
        }else if($acao == "EditarTreino"){
            $rep = isset($_POST['treino_repeticao']) ? $_POST['treino_repeticao'] : ""; 
            $tip = isset($_POST['treino_tipo']) ? $_POST['treino_tipo'] : ""; 
            $usu = isset($_POST['tipo']) ? $_POST['tipo'] : "";
            $obj = new Treino($id,$rep,$tip,$usu);
            $sair = $obj->Editar();
        }

        if(isset($saida)){
            header("Location: ../index/painel.php");
        }

        if(isset($entrar) && $entrar == false){
            header("Location: ../index/cadastro.php?erro=1");
        }

        if(isset($sair)){
            header("Location: ../index/index.php");
        }

        if(isset($final)){
            echo json_encode($final);
        }

        else{
            echo "Impossível realizar sua ação de {$acao}";
        }

    } catch (Exception $e) {
        echo "Erro ao executar os comandos: ('{$e->getMessage()}')\n{$e}\n";
    }
?>

