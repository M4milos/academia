<?php
    require_once('../../classes/autoload.class.php');
    require_once('../utils/utilidades.php');
    session_start();

    if (!empty($_SESSION['usuario'])) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <?php
        $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";
        
        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";

        //echo "Email: ".$email." Senha: ".$senha;

        //echo $_SESSION['usuario'];
        
        // echo    "Tipo: ".$tipo."<br>".
        //         "Ação: ".$acao;
    ?>
    <style>
    
    </style>
</head>
<body>

    <header>
        <?php include_once("../menu/menu.php");?>
    </header>
    
    <div class="center"> 
        <center> 
            <form method="post" action="../processa/processa.php">
                <b><p>Cadastro do Sistema:</p></b>
                <br>
                <b>Nome:</b>&ensp;
                <input class="input" id="nome" name="nome" type="text" value="<?php if(isset($nome)){ echo $nome;} else{ echo "";}?>">
                    <br><br><br>
                <b>Email:</b>&ensp;
                <input class="input" id="email" name="email" type="text" value="<?php if(isset($email)){ echo $email;} else{ echo "";}?>">
                    <br><br><br>
                <b>Cpf:</b>&ensp;
                <input class="input" id="cpf" name="cpf" type="text" value="<?php if(isset($cpf)){ echo $cpf;} else{ echo "";}?>">
                    <br><br><br>
                <b>Senha:</b>&ensp;
                    <input class="input" id="senha" name="senha" type="password" autocomplete="off" value="<?php if(isset($senha)){ echo $senha;} else{ echo "";}?>">
                    <br><br><br>
                <b>Tipo:</b>&ensp;
                <select class="input" id="tipo" name="tipo">
                    <?php
                        echo ListarUsuario(0);
                    ?>
                </select>
                <br><br><br>
                    <div class="text-box">
                        <input class="btn btn-white btn-animate" type="submit" name="acao" value="Cadastrar" id="Cadastrar" class="btn">
                        <!-- <a href="#" class="btn btn-white btn-animate" name="acao" id="Entrar">Cadastrar</a> -->
                    </div>
                    <br><br><br>
                
            </form>
        </center> 
    </div>

 
    <script src="../js/index.js"></script>

</body>
</html>