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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

    <header>
        <?php include_once("../menu/menu.php");?>
    </header>

    <form method="post" action="../processa/processa.php" class="cor">
            <legend class="">
                Entrar no sistema
            </legend>

            <div class="input-group mb-3 ">
                <span class="input-group-text " id="inputGroup-sizing-sm">
                    E-mail: 
                </span>
                <input class="form-control" id="email" name="email" type="text" value="<?php if(isset($email)){ echo $email;} else{ echo "";}?>">
            </div><br>

            <div class="input-group mb-3 ">
                <span class="input-group-text " id="inputGroup-sizing-sm">
                    Senha: 
                </span>
                <input class="form-control" id="senha" name="senha" type="password" autocomplete="off" value="<?php if(isset($senha)){ echo $senha;} else{ echo "";}?>">
            </div><br>
            <input class="btn btn-primary" type="submit" name="acao" id="Entrar" value="Entrar" onclick="">
            <input class="btn btn-primary" type="submit" name="acao" id="Sair" value="Sair" onclick="remover()">

    </form>
    <script src="../js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>