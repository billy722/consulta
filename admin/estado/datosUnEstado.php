<?php
require '../comun.php';
conectar();

$codigo= $_REQUEST['txt_codigo'];

   $consulta="SELECT * FROM estado where id_estado=".$codigo;
   $listaDatos=$con->query($consulta);

$datos="";

      while($filas= $listaDatos->fetch_array()){
         $datos.=$filas['id_estado'];
         $datos.=",".$filas['tipo_estado'];
        
      }

    echo $datos;  

  ?>
