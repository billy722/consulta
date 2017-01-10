<?php
require '../comun.php';
conectar();

$rut= $_REQUEST['txt_rut'];
$nombre= $_REQUEST['txt_nombre'];
$apellido_p= $_REQUEST['txt_apellido_P'];
$apellido_m= $_REQUEST['txt_apellido_m'];
$domicilio= $_REQUEST['txt_domicilio'];
$fono= $_REQUEST['txt_fono'];
$nacionalidad= $_REQUEST['txt_nacionalidad'];

$consultaExiste="SELECT * FROM medico where rut_medico=".$rut;
$resultadoExiste= $con->query($consultaExiste);
if($resultadoExiste->num_rows==0){

//echo "ingresa";
            $consulta= "INSERT INTO medico (`rut_medico`, `nombre_m`, `apellido_p_m`, `apellido_m_m`, `domicilio`, `fono`, `nacionalidad`)
            VALUES ($rut, '$nombre', '$apellido_p', '$apellido_m', '$domicilio', '$fono', '$nacionalidad');";

            if($con->query($consulta)){
                echo "1";
            }else{
                echo "2";
            }

}else{
//echo "modifica";
            $consulta= "update medico set
             nombre_m='$nombre',
             apellido_p_m='$apellido_p',
             apellido_m_m='$apellido_m',
             domicilio='$domicilio',
             fono='$fono',
             nacionalidad='$nacionalidad'
             where rut_medico=".$rut;

            if($con->query($consulta)){
              echo "1";
            }else{
              echo "2";
            }

}

 ?>
