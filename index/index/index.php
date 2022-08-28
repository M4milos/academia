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

        //echo "Email: ".$email." Senha: ".$senha;

        //echo $_SESSION['usuario'];
        
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
                <b><p>Entrar no Sistema:</p></b>
                <br>
                <b>Email:</b>&ensp;
                <input class="input" id="email" name="email" type="text" value="<?php if(isset($email)){ echo $email;} else{ echo "";}?>">
                    <br><br><br>
                <b>Senha:</b>&ensp;
                    <input class="input" id="senha" name="senha" type="password" autocomplete="off" value="<?php if(isset($senha)){ echo $senha;} else{ echo "";}?>">
                    <br><br><br>
                    <div class="text-box">
                        <input class="acao" type="submit" name="acao" id="Entrar" value="Entrar">    
                    <!-- <a href="#" class="btn btn-white btn-animate" name="acao" id="Entrar">Entrar</a> -->
                    </div> 
                    <!--<input class="acao" type="submit" name="acao" id="Sair" value="Sair" onclick="remover()">-->
            </form>
        </center> 
    </div>

 
    <script src="../js/index.js"></script>
</body>
</html>