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
    <script>
        function Treino(){
            location.href='cadastro.php?acao=Treino';
        }
        function Dados(){
            location.href='mostrar.php';
        }
    </script>    
</head>
<body>
    <?php
        require_once('../menu/menu.php');
    ?>
        <div class="fundo">
            <img src="../img/peso.png" style="margin-left: 25%; display: inline-block;">
            <div class= "text-box">
                <input class="acao btn btn-white btn-animate" type="submit" name="acao" onclick="Treino()" value="Cadastrar Treino" />
                <!-- <p>Cadastrar treino</p> --> 
            </div>
            <img src="../img/circuito.png" style="margin-left: 100%; display: inline-block;">
            <div class= "text-box">
                <input class="right btn btn-white btn-animate" type="submit" name="acao" onclick="Dados()" value="Cadastrar Treino" />
                <!-- <p>Visualizar treino</p> -->
            </div> 
        </div>
        <footer></footer>
</body>
</html>