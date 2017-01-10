<?php
require '../comun.php';
conectar();

$rut= $_REQUEST['txt_rut'];

   $consulta="SELECT * FROM paciente where rut_p=".$rut;
   $listaDatos=$con->query($consulta);

$datos="";

      while($filas= $listaDatos->fetch_array()){
         $datos.=$filas['rut_p'];
         $datos.=",".$filas['nombre_p'];
         $datos.=",".$filas['apellido_p_p'];
         $datos.=",".$filas['apellido_m_p'];
         $datos.=",".$filas['sexo_p'];
         $datos.=",".$filas['fecha_nacto_p'];
         $datos.=",".$filas['domicilio'];
		 $datos.=",".$filas['fono'];
		 $datos.=",".$filas['nacionalidad'];
      }

    echo $datos;  

  ?>
