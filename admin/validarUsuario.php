<?php
require './comun.php';
conectar();

//RECIBE LOS CAMPOS
$usuario=$_POST['txt_usuario'];
$clave=$_POST['txt_clave'];

$consultaSql="select * from usuarios where username='".$usuario."' and userpass='".$clave."';";
$resultadoConsulta= $con->query($consultaSql);//ejecuta la consulta


     if($resultadoConsulta->num_rows>0){//si devuelve resultados el usuario existe

        //inicia la sesion
        session_start();
        $_SESSION['idUsuario']=$usuario;
        //redirecciona
        header("location: admin.php");

     }else{
       echo "Usuario Incorrecto";
     }

 ?>
