<?php
    require_once('../../classes/autoload.class.php');
    require_once('../utils/utilidades.php');
    session_start();
    $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; if (empty($acao)) {$acao = isset($_GET['acao']) ? $_GET['acao'] : "";}
    $erro = isset($_GET['erro']) ? $_GET['erro'] : "";
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php if($acao == "Treino"){echo "Cadastrar treino";} elseif($acao == 'Editar') {echo "Editar usuario";} elseif($acao=='EditarTreino'){echo "Editar Treino";} else{echo "Cadastrar no sistema";} ?></title>
    <link rel="stylesheet" href="../css/estilo.css">
    <?php

    if (!empty($_SESSION['usuario']) && $acao == "Editar" || !empty($_SESSION['usuario']) && $acao == "EditarTreino") {
        $list = Login::ListarUsuario($tipo = 1, $info = $_SESSION['usuario']['id']);
        $id = $list[0]['id_usuario'];
        $nome = $list[0]['nome'];
        $email = $list[0]['email'];
        $senha = $list[0]['senha'];
        $tipo = $list[0]['id_funcao'];
    }
    else{
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        if(empty($id)){
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
        }
        $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 0;
    }
    if ($erro == 1) {
        echo "  <script>
                    alert('Por favor, cadastre-se na plataforma');
                </script>";
    } 
        //echo "Email: ".$email." Senha: ".$senha;

        //echo $_SESSION['usuario'];
        
        // echo    "Tipo: ".$tipo."<br>".
        //         "Ação: ".$acao;
        if ($acao) {
            $var = VerificaFuncao($acao);
            // var_dump($var);
            if($acao == "EditarTreino"){
                $campo = Treino::Listar(1,$id);
                $tipo = $campo[0]['id_treino'];
                if($tipo == null){
                    header('Location: index.php?erro=2');
                }
                // echo $id;   
                // var_dump($campo);
                // echo $campo[0]['treino_tipo'];
            }
        }
    ?>
</head>
<body>
    <header>
        <?php include_once("../menu/menu.php");?>
    </header>
    
    <div class="center"> 
        <center> 
            <form method="post" <?php if($acao == "Editar") echo 'id="editar"';?> action="../processa/processa.php" >
                <b><p><?php if($acao == "Treino"){echo "Cadastrar treino";} elseif($acao == "Editar") {echo "Editar usuario";}  elseif($acao == "EditarTreino") {echo "Editar Treino";} else{echo "Cadastrar do sistema";} ?><p id="Selecionar"></p></p></b>
                <br>
                <input type="hidden" name="id" id="id" value="<?php if(isset($id)){ echo $id;} else{ echo "";}?>">
                <?php
                    if($acao == "Treino" || $acao == "EditarTreino")
                        echo "<!--";
                ?>
                    <b>
                        Nome
                    </b>&ensp;
                <input class="input" id="nome" name="nome" type="text" style="padding-left: 10px;" value="<?php if(isset($nome)){ echo $nome;} else{ echo "";}?>">
                    <br><br><br>
                <?php
                    if($acao == "Treino" || $acao == "EditarTreino")
                    echo "-->";
                ?>
                    <b>
                        <?php if ($acao == "Treino" || $acao == "EditarTreino") { echo "Tipo";} else echo "Email";?> 
                    </b>&ensp;
                <input class="input" id="<?php if($acao == 'Treino' || $acao == "EditarTreino") echo $var[0]; else{ echo "email"; }?>" name="<?php if($acao == 'Treino' || $acao == "EditarTreino") echo $var[0]; else{ echo "email"; }?>" type="text" style="padding-left: 10px;" value="<?php if($acao != "EditarTreino"){echo $email;} elseif($acao == "EditarTreino"){ echo $campo[0]['treino_tipo'];}else{ echo "";}?>">
                    <br><br><br>
                    <b> 
                        <?php if ($acao == "Treino" || $acao == "EditarTreino") { echo "Repetições";} else echo "Senha";?>
                    </b>&ensp;
                <input class="input" id="<?php if($acao == 'Treino' || $acao == "EditarTreino") echo $var[1]; else{ echo "senha"; }?>" name="<?php if($acao == 'Treino' || $acao == "EditarTreino") echo $var[1]; else{ echo "senha"; }?>" style="padding-left: 10px;" type="<?php if($acao == 'Treino' || $acao == "EditarTreino") echo "text"; else{ echo "password"; }?>" autocomplete="off" value="<?php if($acao != "EditarTreino"){ echo $senha;} elseif($acao == "EditarTreino"){ echo $campo[0]['treino_repeticao'];} else{ echo "";}?>">
                    <br><br><br>
                    <b>
                        <?php
                            if($acao == "Treino" || $acao == "EditarTreino"){
                                echo "Usuário";
                            }else{
                                echo "Tipo";
                            }
                        ?>
                    </b>&ensp;
                <select class="input" id="tipo" name="tipo">
                    <?php
                    if ($acao == "Treino" || $acao == "EditarTreino") { 
                        echo ListarUser($tipo); 
                    }else{
                        echo ListarUsuario($tipo);
                    }
                        
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