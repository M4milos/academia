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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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

<section class="content-site">
    <div class="container">
        <div class="row">
            <div class="col-xs-12"></div>
        </div>

        <div class="row" style="margin-left: 13%;">
            <div class="col-sm-6">
                <div class="tumbnail">
                    <img src="../img/peso.png" style="margin-left: 25%; width: 20%;">
                    <div class="caption text-center">
                        <div class= "text-box">
                            <input class="acao button button-white button-animate" type="submit" name="acao" onclick="Treino()" value="Cadastrar Treino" style="margin-right: 50%; padding: 7%">
                            <!--    <p>Cadastrar treino</p> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                    <div class="tumbnail">
                        <img src="../img/circuito.png" style="margin-left: 25%; width: 20%;">
                        <div class="caption text-center">
                            <div class="text-box">
                                <input class="right button button-white button-animate" type="submit" name="acao" onclick="Treino()" value="Cadastrar Treino" style="margin-right: 10%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        <footer></footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>