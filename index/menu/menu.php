<script src="../js/jQuery/jquery-3.5.1.min.js"></script>
<script src="../js/ajax.js"></script>
<style>
*{
    margin: 0;
    padding: 0;
}

header{
    background-color: black;
    padding: 0.5%;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
}

h2{
    margin: 1% 0.5% 0%;
}

a{
    color: white;
    text-decoration: none;
    display: block;
    padding: 20px 5px;
    cursor: pointer;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    margin: 20% 0%;
}

a{
    background-image: linear-gradient(to right, #54b3d6, #54b3d6 50%, #fff 50%);
    background-size: 200% 100%;
    background-position: -100%;
    display: inline-block;
    padding: 5px 0;
    position: relative;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    transition: all 0.3s ease-in-out;
}
  
a:before{
    content: '';
    background: #54b3d6;
    display: block;
    position: absolute;
    bottom: -3%;
    left: 0;
    width: 0;
    height: 6%;
    transition: all 0.3s ease-in-out;
}
  
a:hover {
   background-position: 0;
}
  
a:hover::before{
    width: 100%;
}

ul{
    list-style: none;
    position: absolute;
    top: 10%;
    width: 100%;
    
}

label{
    left: <?php if(empty($_SESSION['usuario'])){ echo "88%;";} else {echo "80%;";}?>;
    padding: 18px;
    position: relative;
    display: inline;
}

#check{
    display: none;
}

nav{
    left: 80%;
    background-color: black;
    width: 20%;
    height: 165%;
    position: absolute;
    display: none;
    animation: fade-in 1s;
}

#check:checked ~ nav{
    display: block;
    animation: fade-in 1s;
}

@keyframes fade-in {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
}
  
  @keyframes fade-out {
    from {
      opacity: 1;
    }
    to {
      opacity: 0;
    }
}
</style>
<header>
        <span id="usuario">
        </span>
        <input type="checkbox" id="check">
            <label for="check">
                <img src="../img/list.svg" alt="" id="btn" style="width: 2%; cursor: pointer;">
            </label>
        <nav>
            <center>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="painel.php">Painel de controle</a></li>
                <li><a href="cadastro.php<?php if(!empty($_SESSION['usuario'])){ echo "?acao=Editar";}?>  "><?php if(!empty($_SESSION['usuario'])){ echo "Editar usuario";} else{ echo "Cadastre-se";}?></a></li>
                <li><a href="../processa/processa.php?acao=Sair">Sair</a></li>
            </ul>
            </center>
        </nav>
    </header>
    <script>
        window.addEventListener('load',Listar("<?php echo $_SESSION['usuario']['nome'];?>"));
    </script>