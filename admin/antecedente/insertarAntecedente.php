<?php
require '../comun.php';
conectar();

$codigo= $_REQUEST['txt_codigo'];
$anteced= $_REQUEST['txt_antecedente'];

$consultaExiste="SELECT * FROM antecedentes where id_ant=".$codigo;
$resultadoExiste= $con->query($consultaExiste);
if($resultadoExiste->num_rows==0){

//echo "ingresa";
            $consulta= "INSERT INTO antecedentes (`id_ant`, `tipo_ant`)
            VALUES ($codigo, '$anteced');";

            if($con->query($consulta)){
                echo "1";
            }else{
                echo "2";
            }

}else{
//echo "modifica";
            $consulta= "update antecedentes set
             tipo_ant='$anteced'
             where id_ant=".$codigo;

            if($con->query($consulta)){
              echo "1";
            }else{
              echo "2";
            }

}

 ?>
