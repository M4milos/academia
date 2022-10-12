<?php
    require_once('../../classes/autoload.class.php');
    require_once('../utils/utilidades.php');
    session_start();
    $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; if (empty($acao)) {$acao = isset($_GET['acao']) ? $_GET['acao'] : "";}
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if($acao == "Treino"){echo "Cadastrar treino";} elseif(!empty($_SESSION['usuario'])) {echo "Editar usuario";} else{echo "Cadastrar no sistema";} ?></title>
    <link rel="stylesheet" href="../css/estilo.css">
    <?php

    if (!empty($_SESSION['usuario']) && $acao == "Editar") {
        $list = Login::ListarUsuario($tipo = 1, $info = $_SESSION['usuario']['id']);
        $id = $list[0]['id_usuario'];
        $nome = $list[0]['nome'];
        $email = $list[0]['email'];
        $cpf = $list[0]['cpf'];
        $senha = $list[0]['senha'];
        $tipo = $list[0]['id_funcao'];
    }else{
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 0;
    }
        //echo "Email: ".$email." Senha: ".$senha;

        //echo $_SESSION['usuario'];
        
        // echo    "Tipo: ".$tipo."<br>".
        //         "Ação: ".$acao;
    ?>
</head>
<body>
    <header>
        <?php include_once("../menu/menu.php");?>
    </header>
    
    <div class="center"> 
        <center> 
            <form method="post" <?php if($acao == "Editar") echo 'id="editar"';?> action="../processa/processa.php" >
                <b><p><?php if($acao == "Treino"){echo "Cadastrar treino";} elseif($acao == "Editar") {echo "Editar usuario";} else{echo "Cadastrar do sistema";} ?><p id="Selecionar"></p></p></b>
                <br>
                <input type="hidden" name="id" id="id" value="<?php if(isset($id)){ echo $id;} else{ echo "";}?>">
                <b>Nome:</b>&ensp;
                <input class="input" id="nome" name="nome" type="text" style="padding-left: 10px;" value="<?php if(isset($nome)){ echo $nome;} else{ echo "";}?>">
                    <br><br><br>
                <b>Email:</b>&ensp;
                <input class="input" id="email" name="email" type="text" style="padding-left: 10px;" value="<?php if(isset($email)){ echo $email;} else{ echo "";}?>">
                    <br><br><br>
                <b>Cpf:</b>&ensp;&ensp;
                <input class="input" maxlength="14" id="cpf" name="cpf" type="text" style="padding-left: 10px;" value="<?php if(isset($cpf)){ echo $cpf;} else{ echo "";}?>" onkeyup="Mascara()">
                    <br><br><br>
                <b>Senha:</b>&ensp;
                    <input class="input" id="senha" name="senha" style="padding-left: 10px;" type="password" autocomplete="off" value="<?php if(isset($senha)){ echo $senha;} else{ echo "";}?>">
                    <br><br><br>
                <b>Tipo:</b>&ensp;
                <select class="input" id="tipo" name="tipo">
                    <?php
                        echo ListarUsuario($tipo);
                    ?>
                </select>
                <br><br><br>
                    <div class="text-box">
                        <input class="acao btn btn-white btn-animate" type="submit" name="acao" id="acao" value="<?php if($acao){ echo $acao; } else{ echo "Cadastrar";}?>" class="btn">
                        <!-- <a href="#" class="btn btn-white btn-animate" name="acao" id="Entrar">Cadastrar</a> -->
                    </div>
                    <br><br><br>
            </form>
        </center> 
    </div>
    <script src="../js/jQuery/jquery-3.5.1.min.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="../js/index.js"></script>
</body>
</html>