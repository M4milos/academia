<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
</head>
<body>
 
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