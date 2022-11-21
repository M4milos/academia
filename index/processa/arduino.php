<?php
   require_once('../../classes/autoload.class.php');
   $temperatura = isset($_GET['temp']) ? $_GET['temp'] : "";
   $mov = isset($_GET['mov']) ? $_GET['mov'] : "";
   $acc = isset($_GET['acc']) ? $_GET['acc'] : "";
   if(isset($acc)){
         $obj = new Arduino(null,$temperatura,$mov,$acc);
         $obj->Salvar();
      }
?>