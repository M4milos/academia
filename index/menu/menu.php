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
    left: 88%;
    padding: 18px;
    position: relative;
}

#check{
    display: none;
}

nav{
    left: 80%;
    background-color: black;
    width: 20%;
    height: 100%;
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
        <span>
            <?php
                if (!empty($_SESSION['usuario'])) {
                    echo $_SESSION['usuario'];
                }else{
                    echo "Visitante";
                }
            ?>
        </span>
        <input type="checkbox" id="check">
            <label for="check">
                <img src="../img/list.svg" alt="" id="btn" style="width: 2%; cursor: pointer;">
            </label>
        <nav>
            <center>
            <ul>
                <li><a href="inicial.php">Início</a></li>
                <li><a href="index.php">Login</a></li>
                <li><a href="cadastro.php">Cadastre-se</a></li>
                <li><a href="../processa/processa.php?acao=Sair">Sair</a></li>
                <li><a href="../processa/processa.php?acao=Excluir&arquivo=">Excluir</a></li>
            </ul>
            </center>
        </nav>
    </header>