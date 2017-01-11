<?php
require '../comun.php';
conectar();

$rut= $_REQUEST['txt_rut'];
$fecha= $_REQUEST['txt_fechaSeleccionada'];
$hora= $_REQUEST['txt_id_hora'];

$consultaExiste="SELECT * FROM paciente where rut_p=".$rut;
$resultadoExiste= $con->query($consultaExiste);
if($resultadoExiste->num_rows==0){

//echo "ingresa";
            echo "3";//el paciente no ha sido ingresado en el sistema
}else{

        $consulta= "INSERT INTO reserva (`fecha`, `hora`, `id_estado`, `rut_medico`, `rut_p`) VALUES ('$fecha', '$hora', '1', '18273352', '$rut');";
        if($con->query($consulta)){
          echo "1";
        }else{
          echo $consulta;
          echo "2";
        }
}

 ?>
