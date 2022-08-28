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
    <?php
        if(!empty($_SESSION['usuario'])){
            echo "Logado com sucesso";
        }else{
            echo "Cadastrado com sucesso";
        }
    ?>
</head>
<body>
    
</body>
</html>