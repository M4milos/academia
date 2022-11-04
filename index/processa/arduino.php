<?php
   require_once('../../classes/autoload.class.php');
   $temperatura = isset($_GET['temperature']) ? $_GET['temperature'] : "";
   $acc = isset($_GET['acc']) ? $_GET['acc'] : "";
   if(isset($temperatura) && isset($acc)){
         $obj = new Arduino(null,$temperatura);
         $obj->Salvar();
      }
?>