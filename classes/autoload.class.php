<?php
    spl_autoload_register(function($class){
        try {
            include $class . '.class.php';
        } catch (Exception $e) {
            throw new Exception("Erro ao carregar classes: ".$e->getMessage());
        }
    })
?>