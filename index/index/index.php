<?php
    require_once('../../classes/autoload.class.php')
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

        //echo $email;
        
    ?>
</head>
<body>
    <form method="post">
        <legend class="col-form-label">
            Entrar no sistema
        </legend>
        <div class="col-sm-10">
            <div class="form-check">
                <label class="form-check-label-email" for="email">
                    E-mail: 
                </label>
                <input class="container-input" id="email" name="email" type="text" required>
            </div><br>
            <div>
                <label class="form-check-label-senha" for="senha">
                    Senha: 
                </label>
                <input class="container-input-sec" id="senha" name="senha" type="password" required>
            </div><br>
            <input class="form-check-input-submit" type="submit" id="Entrar" value="Entrar" onclick="ValidarEmail(),ValidarSenha()">
        </div>
    </form>
    <footer class="footer"></footer>
    <script src="../js/index.js"></script>
</body>
</html>