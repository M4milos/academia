<?php
    function Index(){
        header("Location: ../index/index.php");
    }

    function Exibir($chave, $dado, $selecao = 0){
        $str = "<option value=0>Selecione</option>";
        $check="";
        foreach($dado as $linha){
            if($selecao > 0 && $linha['id_funcao'] == $selecao){
                $check = "selected";
            }
            //var_dump($linha);
            $str .= "<option ".$check." value='".$linha['id_funcao']."'>".$linha['nome']."</option>";
            $check = "";
        }
        return $str;
    }

    function ListarUsuario($selecao){
        $lista = Login::ListarPersonal();
        //var_dump($lista);
        return Exibir(array('id_funcao','funcao'),$lista, $selecao);
    }


    function CriarCadastro(string $tipo,int $quantidade){

    for ($i=0; $i < $quantidade; $i++) {

    $rand = rand(1,9);

    $filename = "Arquivo ". $tipo . $rand .".php";

    $file = fopen($filename, "w");
     
    if ($tipo == "Cadastro") {
            $string = 
'<?php
    require_once("../../classes/autoload.class.php");
    require_once("../utils/utilidades.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <?php
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $cpf = isset($_POST["cpf"]) ? $_POST["cpf"] : "";
        $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
        $tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : "";
        
        $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

        if (empty($acao)) {
            $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
        }

        //echo "Email: ".$email." Senha: ".$senha;

        //echo $_SESSION["usuario"];
        
        // echo    "Tipo: ".$tipo."<br>".
        //         "Ação: ".$acao;
    ?>
</head>
<body>
    <header>
        <?php include_once("../menu/menu.php");?>
    </header>
    
    <div class="center"> 
        <center> 
            <form method="post" action="../processa/processa.php">
                <b><p>Cadastro do Sistema: <p id="Selecionar"></p></p></b>
                <br>
                <b>Nome:</b>&ensp;
                <input class="input" id="nome" name="nome" type="text" style="padding-left: 10px;" value="<?php if(isset($nome)){ echo $nome;} else{ echo "";}?>">
                    <br><br><br>
                <b>Email:</b>&ensp;
                <input class="input" id="email" name="email" type="text" style="padding-left: 10px;" value="<?php if(isset($email)){ echo $email;} else{ echo "";}?>">
                    <br><br><br>
                <b>Cpf:</b>&ensp;&ensp;
                <input class="input" maxlength="14" id="cpf" name="cpf" type="text" style="padding-left: 10px;" value="<?php if(isset($cpf)){ echo $cpf;} else{ echo "";}?>" onkeyup="Mascara()">
                    <br><br><br>
                <b>Senha:</b>&ensp;
                    <input class="input" id="senha" name="senha" style="padding-left: 10px;" type="password" autocomplete="off" value="<?php if(isset($senha)){ echo $senha;} else{ echo "";}?>">
                    <br><br><br>
                <b>Tipo:</b>&ensp;
                <select class="input" id="tipo" name="tipo">
                    <?php
                        echo ListarUsuario(0);
                    ?>
                </select>
                <br><br><br>
                    <div class="text-box">
                        <input class="acao btn btn-white btn-animate" type="submit" name="acao" value="Cadastrar" id="Cadastrar" class="btn">
                        <!-- <a href="#" class="btn btn-white btn-animate" name="acao" id="Entrar">Cadastrar</a> -->
                    </div>
                    <br><br><br>
                
            </form>
        </center> 
    </div>
    <script src="../js/index.js"></script>
</body>
</html>';}
        elseif ($tipo == "Login") {
            $string = 
'<?php
require_once("../../classes/autoload.class.php");
session_start();
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="../css/estilo.css">
<?php
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if (empty($acao)) {
        $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    }

    //echo "Email: ".$email." Senha: ".$senha;

    //echo $_SESSION["usuario"];
    
?>
<style>
    
</style>
</head>
<body>
    <?php include_once("../menu/menu.php");?>
<div class="center">  
    <center> 
        <form method="post" action="../processa/processa.php">
            <b><p>Entrar no Sistema:</p></b>
            <br>
            <b>Email:</b>&ensp;
            <input class="input" id="email" name="email" type="text" autocomplete="off" style="padding-left: 10px;" value="<?php if(isset($email)){ echo $email;} else{ echo "";}?>">
                <br><br><br>
            <b>Senha:</b>&ensp;
                <input class="input" id="senha" name="senha" type="password"  style="padding-left: 10px;" autocomplete="off" value="<?php if(isset($senha)){ echo $senha;} else{ echo "";}?>">
                <br><br><br>
            <!-- <b>Senha:</b>&ensp;
                <input class="input" id="senha" name="senha" type="password"  style="padding-left: 10px;" autocomplete="off" value="<?php if(isset($senha)){ echo $senha;} else{ echo "";}?>">
                <br><br><br> -->
                <div class="text-box">
                    <input class="acao btn btn-white btn-animate" type="submit" name="acao" id="Entrar" value="Entrar">    
                <!-- <a href="#" class="btn btn-white btn-animate" name="acao" id="Entrar">Entrar</a> -->
                </div> 
                <!--<input class="acao" type="submit" name="acao" id="Sair" value="Sair" onclick="remover()">-->
            <!-- <a class="#" href="index.php?acao=esqueci">Esqueci a senha</a> -->
        </form>
    </center> 
</div>
<script src="../js/index.js"></script>
</body>
</html>';
        }
else{
            return false;
        }
        $file = fwrite($file, $string);
    }
}


?>