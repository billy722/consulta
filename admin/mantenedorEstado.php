<?php
require 'comun.php';
 conectar();
 ?>
<!DOCTYPE html>
<html>

<head>
	<title>IngresoEstado</title>
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

<br><br>
<div class="contenedorPrincipal">

<div id="cortinaModal" class="oculto">
  <div id="ventanaFormularioCrearEstado" class="oculto">

    <form  name="formularioCrearEstado" id="formularioCrearEstado" >
        <table class="tabla" align="center">
          <tr>
              <td>Codigo:&nbsp;</td>
              <td><input required type="text" name="txt_codigo" id="txt_codigo" maxlength="10"  placeholder="Ingrese su Codigo"></td>
          </tr>
		  <tr>
              <td>Tipo Estado:&nbsp;</td>
              <td><input required type="text" name="txt_estado" id="txt_estado"></td>
          </tr>
        <td>&nbsp;</td>
    		   <td colspan="2">
    			  <input type="submit" value="GUARDAR">
            <input type="reset" value="LIMPIAR">
            <input type="button" onClick="ocultarFormularioCrear()" value="CANCELAR">
          </td>
      </tr>
		 </table>
    </form>
 </div>
</div>



<!-- LISTADO MEDICOS -->
<center>
   <input type="button" value="Nuevo Estado" onClick="mostarFormularioCrear()" >

   <div id="contenedorListadoEstado"></div>

</center>

</div>

<?php
   libreriasComunes();
 ?>





<script>



  function cargarEstado(){

    $.ajax({
       url:"./estado/mostrarEstado.php",
       success:function(respuesta){
          $("#contenedorListadoEstado").html(respuesta);
       }
    });

  }

  cargarEstado();//carga la funcion al abrir la pagina


  function eliminarEstado(codigo){

    $.ajax({
      url:"./estado/eliminarEstado.php?codigo="+codigo,
      success:function(respuesta){

         if(respuesta==1){
            alert("Eliminado Correctamente");
            cargarEstado();
         }else if(respuesta==2){
            alert("Ocurrio un error al eliminar.");
         }else{
            alert(respuesta);
         }

      }
    });
  }


  function mostarFormularioCrear(){
      $("#formularioCrearEstado")[0].reset();

      $("#cortinaModal").removeClass("oculto");
      $("#ventanaFormularioCrearEstado").removeClass("oculto");
  }
  function ocultarFormularioCrear(){
    $("#cortinaModal").addClass("oculto");
      $("#ventanaFormularioCrearEstado").addClass("oculto");
  }


//INSERTAR o MODIFICA ESTADO
  $("#formularioCrearEstado").submit(function(event){
       event.preventDefault();
       //alert("se detuvo");


       $.ajax({
         url:"./estado/insertarEstado.php",
         data:$("#formularioCrearEstado").serialize(),
         success:function(respuesta){
           //alert(respuesta);
           if(respuesta==1){
              alert("Guardado Correctamente");
              ocultarFormularioCrear();
              cargarEstado();

           }else if(respuesta==2){

              alert("Ocurrio un error al crear.");

           }
         }
       });

  });

   function datosUnEstado(codigo){
     mostarFormularioCrear();


     $.ajax({
        url:"./estado/datosUnEstado.php?txt_codigo="+codigo,
        success:function(respuesta){
          var datosRecibidos= respuesta.split(",");

          var codigo=datosRecibidos[0];
          var estado=datosRecibidos[1];


          $('#txt_codigo').val(codigo);
          $('#txt_estado').val(estado);

        }
     });
  }



</script>
</body>
</html>
