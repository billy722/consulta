<?php
require '../comun.php';
conectar();

$rut= $_REQUEST['txt_rut'];

   $consulta="SELECT * FROM medico where rut_medico=".$rut;
   $listaDatos=$con->query($consulta);

$datos="";

      while($filas= $listaDatos->fetch_array()){
         $datos.=$filas['rut_medico'];
         $datos.=",".$filas['nombre_m'];
         $datos.=",".$filas['apellido_p_m'];
         $datos.=",".$filas['apellido_m_m'];
         $datos.=",".$filas['domicilio'];
         $datos.=",".$filas['fono'];
         $datos.=",".$filas['nacionalidad'];
      }

    echo $datos;  

  ?>
