<?php
require '../comun.php';
conectar();

 $rut= $_REQUEST['rut'];

   $consulta="delete from paciente where rut_p=".$rut;
   //echo $consulta;

   if($con->query($consulta)){
      echo "1";
   }else{
      echo "2";
   }

 ?>
