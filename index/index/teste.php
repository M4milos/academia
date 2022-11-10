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
</head>
<body>
    <button id="rand">Rand</button>
<script>

    const botao = addEventListener('click', function(ev){
        ev.preventDefault();
        let teste = Math.floor(Math.random() * 16);
        let teste2 = Math.floor(Math.random() * 16);
        let teste3 = Math.floor(Math.random() * 16);

        console.log('Valor 1: '+teste+' Valor 2: '+teste2+' Valor 3: '+teste3);

        let conta = Math.sqrt((teste^2) + (teste2^2) + (teste3^2));

        console.log(conta);

    })    
</script>
</body>
</html>