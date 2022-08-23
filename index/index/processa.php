<?php
    $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivos'] : null;

    var_dump($_FILES);

    $destino = "imagens/".$arquivo['name'];

    move_uploaded_file($arquivo['tmp_name'], $destino );
?>