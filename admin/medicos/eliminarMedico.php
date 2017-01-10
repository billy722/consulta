<?php
require '../comun.php';
conectar();

 $rut= $_REQUEST['rut'];

   $consulta="delete from medico where rut_medico=".$rut;
   //echo $consulta;

   if($con->query($consulta)){
      echo "1";
   }else{
      echo "2";
   }

 ?>
