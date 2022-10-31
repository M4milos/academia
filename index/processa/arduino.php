<?php
   require_once('../../classes/autoload.class.php');
   $temperatura = isset($_GET['temperatura']) ? $_GET['temperatura'] : "";
   $acx = isset($_GET['acx']) ? $_GET['acx'] : "";
   $acy = isset($_GET['acy']) ? $_GET['acy'] : "";
   $acz = isset($_GET['acz']) ? $_GET['acz'] : "";
   $gyx = isset($_GET['gyx']) ? $_GET['gyx'] : "";
   $gyy = isset($_GET['gyy']) ? $_GET['gyy'] : "";
   $gyz = isset($_GET['gyz']) ? $_GET['gyz'] : "";
   if(isset($temperatura) && isset($acx) && isset($acy) && isset($acz) && isset($gyx) && isset($gyy) && isset($gyz)){
         $obj = new Arduino(null,$temperatura,$acx,$acy,$acz,$gyx,$gyy,$gyz);
         $obj->Salvar();
      }
?>