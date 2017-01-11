<?php
require '../comun.php';
conectar();

$codigo= $_REQUEST['txt_codigo'];

   $consulta="SELECT * FROM consulta where id_consulta=".$codigo;
   $listaDatos=$con->query($consulta);

$datos="";

      while($filas= $listaDatos->fetch_array()){
         $datos.=$filas['id_consulta'];
         $datos.=",".$filas['sintomas'];
         $datos.=",".$filas['observaciones'];
         $datos.=",".$filas['receta'];
         $datos.=",".$filas['rut_medico'];
         $datos.=",".$filas['rut_p'];

      }

    echo $datos;

  ?>
