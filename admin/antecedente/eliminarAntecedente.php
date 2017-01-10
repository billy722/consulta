<?php
require '../comun.php';
conectar();

 $codigo= $_REQUEST['codigo'];

   $consulta="delete from antecedentes where id_ant=".$codigo;
   //echo $consulta;

   if($con->query($consulta)){
      echo "1";
   }else{
      echo "2";
   }

 ?>
