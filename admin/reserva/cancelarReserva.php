<?php
require '../comun.php';
conectar();

 $codigo= $_REQUEST['codigo'];

   $consulta="update reserva set id_estado=3 where id_reserva=".$codigo;
   //echo $consulta;

   if($con->query($consulta)){
      echo "1";
   }else{
      echo "2";
   }

 ?>
