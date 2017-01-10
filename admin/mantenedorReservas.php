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



<!-- LISTADO  -->
<center>
  <!-- selector fecha  -->
  <div id="selectorFecha">
    <label for="txt_fecha">SELECCIONE UNA FECHA</label>
    <br>
    <input type="date" id="txt_fecha" name="txt_fecha">
    <button onclick="mostrarReservas()" >Mostrar</button>
  </div>

    <input type="button" value="Nuevo Estado" onClick="mostarFormularioCrear()" >

    <div id="contenedorListadoEstado"></div>
</center>

</div>

<?php
   libreriasComunes();
 ?>





<script>



  function mostrarReservas(){

   var fecha = $("#txt_fecha").val();
   if(fecha!=""){

        $.ajax({
           url:"./reserva/mostrarHoras.php?fecha="+fecha,
           success:function(respuesta){
              $("#contenedorListadoEstado").html(respuesta);
           }
        });

   }else{
     alert("Seleccione primero una fecha");
   }

  }

  mostrarReservas();//carga la funcion al abrir la pagina


  function cancelarReserva(codigo){

    $.ajax({
      url:"./reserva/cancelarReserva.php?codigo="+codigo,
      success:function(respuesta){

         if(respuesta==1){
            alert("Cancelada Correctamente");
            mostrarReservas();
         }else if(respuesta==2){
            alert("Ocurrio un error al eliminar.");
         }else{
            alert(respuesta);
         }

      }
    });
  }


  function mostarFormularioCrear(idHora,fecha){
    //alert("hora es: "+idHora+" fecha es: "+fecha);
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
              mostrarReservas();

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
