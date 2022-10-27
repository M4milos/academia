<!-- <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
</head>
<body>
    <form action="#" method="post">
        <label for="name">Name do treino: </label><input type="text" name="nome" id="nome"> <input type="checkbox" name="treino" id="treino"><label for="">Treino já existe</label><br>
        <label for="qnt">Quantidade: </label><input type="text" name="quantidade" id="quantidade"><br>
        <select name="select" id="select" disabled>
            <option value="Braço">Braço</option>
            <option value="Perna">Perna</option>
            <option value="XXXXXXX">XXXXXXX</option>
            <option value="YYYYYYY">YYYYYYY</option>
        </select>
    </form>

    <script>
        document.getElementById("treino").onclick = function () {
            const input = document.querySelector('#nome');
            const select = document.querySelector('#select');
            const check = document.querySelector('#treino');
            if (check.checked) {
                input.disabled = true;
                input.value = "";
                select.disabled = false;
            }else{
                input.disabled = false;
                select.disabled = true;
            }
        }
    </script>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo3.css">
    <title>Teste</title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="../js/charts.js"></script>
    



</head>
<body>
    <div>
        <table id="listar"></table>
    </div>
    <center>
        <div id="botao">
            <button class=" button1 button" style="padding: 1%; margin-top: 2%;" id="iniciar" value="iniciar">Iniciar os gráficos</button>
            <button class=" button1 button" style="padding: 1%; margin-top: 2%;" id="finalizar" value="finalizar">Finalizar os gráficos</button>
        </div>
    </center>
    <div id="grafico" style="width: 100%; height: 500px;"></div>
    <script src="../js/script.js"></script>
</body>
</html>