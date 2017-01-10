<?php
require '../comun.php';
conectar();

$codigo= $_REQUEST['txt_codigo'];

   $consulta="SELECT * FROM antecedentes where id_ant=".$codigo;
   $listaDatos=$con->query($consulta);

$datos="";

      while($filas= $listaDatos->fetch_array()){
         $datos.=$filas['id_ant'];
         $datos.=",".$filas['tipo_ant'];
        
      }

    echo $datos;  

  ?>
