<?php
    session_start();
    $titulo = "Painel de controle";
    require_once('../../classes/autoload.class.php');
    require_once('../utils/utilidades.php');  
    $tipo = 0;
    $info = "";  
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if($titulo) echo $titulo; else ""; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> 
    <link rel="stylesheet" href="../css/painel.css">
</head>

<body>
    <?php
        require_once('../menu/menu.php');
    ?>
    <div class="content">
        <div class="row" style="margin-left: 13%;">
            <div class="col-sm-6">
                <h2 style="margin-top: 3%; margin-left: 35%; width: 25%;">Painel de Controle</h2>
            </div>
        </div>
    </div>
    <center>
        <br>
        <h2>Dados do Usuário</h2>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Função</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
                <?php
                    echo ListarPainel($tipo, $info);
                ?>
            </thead>
        </table>
        <br>
        <h2>Dados de Treinos</h2>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Repetições</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
                <?php
                    echo ListarTreino($tipo, $info);
                ?>
            </thead>
        </table>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>