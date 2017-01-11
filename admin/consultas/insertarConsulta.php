<?php
require '../comun.php';
conectar();

$codigo= $_REQUEST['txt_codigo'];
$sintoma= $_REQUEST['txt_sintoma'];
$observacion= $_REQUEST['txt_observacion'];
$receta= $_REQUEST['txt_receta'];
$medico= $_REQUEST['txt_medico'];
$paciente= $_REQUEST['txt_paciente'];

$consultaExiste="SELECT * FROM consulta where id_consulta=".$codigo;
$resultadoExiste= $con->query($consultaExiste);
if($resultadoExiste->num_rows==0){

//echo "ingresa";
            $consulta= "INSERT INTO consulta (`id_consulta`, `sintomas`, `observaciones`, `receta`,`rut_medico`, `rut_p`)
            VALUES ($codigo, '$sintoma', '$observacion', '$receta', '$medico', '$paciente');";

            if($con->query($consulta)){
                echo "1";
            }else{
                echo "2";
            }

}else{
//echo "modifica";
            $consulta= "update consulta set
             tipo_estado='$sintoma'
             where id_consulta=".$codigo;

            if($con->query($consulta)){
              echo "1";
            }else{
              echo "2";
            }

}

 ?>
