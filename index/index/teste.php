<?php
    include('../../classes/autoload.class.php');
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testa</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <form action="processa.php" method="POST" enctype="multipart/form-data">
        <label for="">Imagem de fundo: </label>
        <input type="file" name="arquivo" id="arquivo">
        <input type="submit" value="Salvar" name="acao">
    </form>
</body> 
</html>