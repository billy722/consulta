<?php
require '../comun.php';
conectar();

$codigo= $_REQUEST['txt_codigo'];
$estado= $_REQUEST['txt_estado'];

$consultaExiste="SELECT * FROM estado where id_estado=".$codigo;
$resultadoExiste= $con->query($consultaExiste);
if($resultadoExiste->num_rows==0){

//echo "ingresa";
            $consulta= "INSERT INTO estado (`id_estado`, `tipo_estado`)
            VALUES ($codigo, '$estado');";

            if($con->query($consulta)){
                echo "1";
            }else{
                echo "2";
            }

}else{
//echo "modifica";
            $consulta= "update estado set
             tipo_estado='$estado'
             where id_estado=".$codigo;

            if($con->query($consulta)){
              echo "1";
            }else{
              echo "2";
            }

}

 ?>
