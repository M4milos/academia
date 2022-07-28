<?php
    spl_autoload_register(function($class){
        try {
            include $class . '.class.php';
        } catch (Exception $e) {
            print "Erro ao carregar classes: ". $e->getMessage();
        }
    })
?>