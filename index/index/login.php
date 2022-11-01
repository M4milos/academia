<?php
    require_once('../../classes/autoload.class.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <?php
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";

        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";

        if (empty($acao)) {
            $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
        }
    ?>
    <style>
        
    </style>
</head>
<body>
        <?php include_once("../menu/menu.php");?>
    <div class="center">  
        <center> 
            <form method="post" action="../processa/processa.php">
                <b><p>Entrar no Sistema:</p></b>
                <br>
                <b>Email:</b>&ensp;
                <input class="input" id="email" name="email" type="text" autocomplete="off" style="padding-left: 10px;" value="<?php if(isset($email)){ echo $email;} else{ echo "";}?>">
                    <br><br><br>
                <b>Senha:</b>&ensp;
                    <input class="input" id="senha" name="senha" type="password"  style="padding-left: 10px;" autocomplete="off" value="<?php if(isset($senha)){ echo $senha;} else{ echo "";}?>">
                    <br><br><br>
                <!-- <b>Senha:</b>&ensp;
                    <input class="input" id="senha" name="senha" type="password"  style="padding-left: 10px;" autocomplete="off" value="<?php if(isset($senha)){ echo $senha;} else{ echo "";}?>">
                    <br><br><br> -->
                    <div class="text-box">
                        <input class="acao btn btn-white btn-animate" type="submit" name="acao" id="Entrar" value="Entrar">    
                    <!-- <a href="#" class="btn btn-white btn-animate" name="acao" id="Entrar">Entrar</a> -->
                    </div> 
                    <!--<input class="acao" type="submit" name="acao" id="Sair" value="Sair" onclick="remover()">-->
                <!-- <a class="#" href="index.php?acao=esqueci">Esqueci a senha</a> -->
            </form>
        </center> 
    </div>
    <script src="../js/index.js"></script>
</body>
</html>