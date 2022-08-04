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
</head>
<body>
    <header>
        <h1>Logado como: <?php if(!empty($_SESSION['usuario'])){echo $_SESSION['usuario'];} else{echo "Visitante";}?></h1>
    </header>
    <form method="post" action="../processa/processa.php">
        <legend class="col-form-label">
            Entrar no sistema
        </legend>
        <div class="col-sm-10">
            <div class="form-check">
                <label class="form-check-label-email" for="email">
                    E-mail: 
                </label>
                <input class="container-input" id="email" name="email" type="text" value="<?php if(isset($email)){ echo $email;} else{ echo "";}?>">
            </div><br>
            <div>
                <label class="form-check-label-senha" for="senha">
                    Senha: 
                </label>
                <input class="container-input-sec" id="senha" name="senha" type="password" autocomplete="on" value="<?php if(isset($senha)){ echo $senha;} else{ echo "";}?>">
            </div><br>
            <input class="form-check-input-submit" type="submit" name="acao" id="Entrar" value="Entrar" onclick="">
            <input class="" type="submit" name="acao" id="Sair" value="Sair" onclick="remover()">
        </div>
    </form>
    <footer class="footer"></footer>
    <script src="../js/index.js"></script>
</body>
</html>