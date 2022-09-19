<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <link rel="stylesheet" href="../css/estilo2.css">
</head>
<body>
    <?php
        require_once('../menu/menu.php');
    ?>
        <div class="fundo">
            <img src="../img/peso.png" style="margin-left: 25%; display: inline-block;">
            <input type="button" onclick="location.href='cadastro.php';" value="Cadastrar Treino" />
                <!-- <p>Cadastrar treino</p> -->
            <img src="../img/circuito.png" style="margin-right: 25%; float: right;" >
                <!-- <p>Visualizar treino</p> -->
        </div>
        <footer></footer>
</body>
</html>