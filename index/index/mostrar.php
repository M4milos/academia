<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script src="../js/jQuery/jquery-3.5.1.min.js"></script>
    <title>Visualizar Treinos</title>
</head>
<body>
<div>
    <table id="listar"></table>
</div>
    <center>
        <div id="botao">
            <button class="button1 button" style="padding: 1%; margin-top: 2%;" id="iniciar" value="iniciar">Iniciar os gráficos</button>
            <button class="button1 button" style="padding: 1%; margin-top: 2%;" id="finalizar" value="finalizar">Finalizar os gráficos</button>
        </div>
    </center>
    <div id="grafico" style="width: 100%; height: 500px;"></div>
    
    <script src="../js/script.js"></script>
    <script type="text/javascript" src="../js/charts.js"></script>
</body>
</html>