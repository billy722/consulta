<?php
require '../comun.php';
conectar();

$rut= $_REQUEST['txt_rut'];
$nombre= $_REQUEST['txt_nombre'];
$apellido_p= $_REQUEST['txt_apellido_P'];
$apellido_m= $_REQUEST['txt_apellido_m'];
$sexo= $_REQUEST['txt_sexo'];
$fechaN= $_REQUEST['txt_fecha_n'];
$domicilio= $_REQUEST['txt_domicilio'];
$fono= $_REQUEST['txt_fono'];
$nacionalidad= $_REQUEST['txt_nacionalidad'];

$consultaExiste="SELECT * FROM paciente where rut_p=".$rut;
$resultadoExiste= $con->query($consultaExiste);
if($resultadoExiste->num_rows==0){

//echo "ingresa";
            $consulta= "INSERT INTO paciente (`rut_p`, `nombre_p`, `apellido_p_p`, `apellido_m_p`,`sexo_p`,`fecha_nacto_p`, `domicilio`, `fono`, `nacionalidad`)
            VALUES ($rut, '$nombre', '$apellido_p', '$apellido_m','$sexo','$fechaN', '$domicilio', '$fono', '$nacionalidad');";

            if($con->query($consulta)){
                echo "1";
            }else{
                echo "2";
            }

}else{
//echo "modifica";
            $consulta= "update paciente set
             nombre_p='$nombre',
             apellido_p_p='$apellido_p',
             apellido_m_p='$apellido_m',
			 sexo_P='$sexo',
			 fecha_nacto_p='$fechaN',
             domicilio='$domicilio',
             fono='$fono',
             nacionalidad='$nacionalidad'
             where rut_p=".$rut;

            if($con->query($consulta)){
              echo "1";
            }else{
              echo "2";
            }

}

 ?>
