<?php
    require_once('../utils/utilidades.php');

    // CriarCadastro("Cadastro" , 3);


    $pasta = '../index'; 
    $diretorio = dir($pasta);

    while ( $arquivo = $diretorio -> read() ) { 
            echo "<a href='".$arquivo."'>".$arquivo."</a><br />";
    }

    $diretorio -> close();

    


?>