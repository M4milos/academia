<!DOCTYPE html>
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
</html>