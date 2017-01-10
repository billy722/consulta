<?php
require './comun.php';
conectar();
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>ADMINISTRADOR</title>
 <link rel="stylesheet" type="text/css" href="../css/estilos.css">
 <link rel="stylesheet" type="text/css" href="../css/estilos-index.css">
</head>

<body>
<?php
session_start();

if(isset($_SESSION['idUsuario'])){//SI LA SESION ESTA INICIADA MUESTRA EL BOTON PARA SALIR

        echo'<p align="right"><a href="cerrarSesion.php">Cerrar Session</a></p>';

}else{// SI LA SESION NO ESTA INICIADA LO ENVIA DE NUEVO AL INDEX

        header("location: ../index.html");
}

?>
<div id="header">
  <?php
   menuComun();
   ?>
</div>
</body>
</html>
