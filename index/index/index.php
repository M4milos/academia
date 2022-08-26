<?php
    require_once('../../classes/autoload.class.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet">
    <?php
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
        
        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";

        //echo "Email: ".$email." Senha: ".$senha;

        //echo $_SESSION['usuario'];
        
    ?>
    <style>
    html, body{
            /* width: 100%;
        height: 100%; */
        background: #72ABB8;
        margin: 0px;
        overflow-x: hidden;      
    }

    .cor{
        padding: 40px;
        border-radius: 12px;
        width: 480px;
        font-family: 'Courier New', Courier, monospace;
        font-size: 18px;
    }

    legend {
        text-align: center;
    }

        .acao {
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 30px;
        color: black; 
        font-family: Arial;
        font-size: 15px;
        font-weight: 100;
        padding: 2%;
        background-color: #D9D9D9;
        border: none;
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
        text-align: center;
        width: 35%;
    }

    header{
        background-color: black;
        padding: 20px;
        margin: 0px;

    }

    .input{
        border-radius: 2vh;
        width:80%;
        height: 6vh;
        border: none;
        background-color: #D9D9D9;
    }

        .center{
        margin: 5% 30%;
    }


    .btn:link,
    .btn:visited {
        text-transform: uppercase;
        text-decoration: none;
        padding: 15px 40px;
        display: inline-block;
        border-radius: 100px;
        transition: all .2s;
        position: relative;
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .btn:active {
        transform: translateY(-1px);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .btn-white {
    background-color: #E3E3E3;
    color: black;
}

.btn::after {
    content: "";
    display: inline-block;
    height: 100%;
    width: 100%;
    border-radius: 100px;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    transition: all .4s;
}

.btn-white::after {
    background-color: #D9D9D9;
}

.btn:hover::after {
    transform: scaleX(1.4) scaleY(1.6);
    opacity: 0;
}

.btn-animated {
    animation: moveInBottom 5s ease-out;
    animation-fill-mode: backwards;
}

@keyframes moveInBottom {
    0% {
        opacity: 0;
        transform: translateY(30px);
    }

    100% {
        opacity: 1;
        transform: translateY(0px);
    }
}

    </style>
</head>
<body>

    <header>
        <?php include_once("../menu/menu.php");?>
    </header>
    
    <div class="center"> 
        <center> 
            <form method="post" action="../processa/processa.php">
                <b><p>Entrar no Sistema:</p></b>
                <br>
                <b>Email:</b>&ensp;
                <input class="input" id="email" name="email" type="text" value="<?php if(isset($email)){ echo $email;} else{ echo "";}?>">
                    <br><br><br>
                <b>Senha:</b>&ensp;
                    <input class="input" id="senha" name="senha" type="password" autocomplete="off" value="<?php if(isset($senha)){ echo $senha;} else{ echo "";}?>">
                    <br><br><br>
                    <div class="text-box">
                        <a href="#" class="btn btn-white btn-animate" name="acao" id="Entrar">Entrar</a>
                    </div> 
                    <!--<input class="acao" type="submit" name="acao" id="Sair" value="Sair" onclick="remover()">-->
            </form>
        </center> 
    </div>

 
    <script src="../js/index.js"></script>
</body>
</html>