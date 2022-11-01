<?php
    session_start();
    $titulo = "Painel de controle";
    require_once('../../classes/autoload.class.php');
    require_once('../utils/utilidades.php');  
    $tipo = 1;
    $info = $_SESSION['usuario']['id'];  
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if($titulo) echo $titulo; else ""; ?></title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Id</td>
            <td>Nome</td>
            <td>Email</td>
            <td>Senha</td>
            <td>Cpf</td>
            <td>Função</td>
            <td>Editar</td>
            <td>Excluir</td>
        </tr>
        <?php
            echo ListarPainel($tipo, $info);
        ?>
    </table>
</body>
</html>