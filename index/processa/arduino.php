<?php
   require_once('../../classes/autoload.class.php');
   $temperatura = isset($_GET['temperatura']) ? $_GET['temperatura'] : "";
   $acx = isset($_GET['acx']) ? $_GET['acx'] : "";
   $acy = isset($_GET['acy']) ? $_GET['acy'] : "";
   $gyx = isset($_GET['gyx']) ? $_GET['gyx'] : "";
   $gyy = isset($_GET['gyy']) ? $_GET['gyy'] : "";

   if(isset($temperatura) && isset($acx) && isset($acy) && isset($gyx) && isset($gyy)){
         $obj = new Arduino(null,$temperatura,$acx,$acy,$gyx,$gyy);
         $obj->Salvar();
      }
?>