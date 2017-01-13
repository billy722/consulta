<?php
require 'comun.php';
 conectar();
 ?>
<!DOCTYPE html>
<html>

<head>
	<title>IngresoDoctor</title>
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
  <div id="ventanaFormularioCrearMedico" class="oculto">

    <form  name="formularioCrearMedico" id="formularioCrearMedico" >
        <table class="tabla" align="center">
          <tr>
              <td>Rut:&nbsp;</td>
              <td><input required type="text" name="txt_rut" id="txt_rut" onKeyPress="return soloNumerosyK(event);" maxlength="10"  placeholder="Ingrese su rut"></td>
          </tr>
		      <tr>
              <td>Nombre:&nbsp;</td>
              <td><input required type="text" name="txt_nombre" id="txt_nombre"></td>
          </tr>
		      <tr>
              <td>Apellido P:&nbsp;</td>
              <td><input required type="text" name="txt_apellido_P" id="txt_apellido_P"></td>
          </tr>
		      <tr>
              <td>Apellido M:&nbsp;</td>
              <td><input required type="text" name="txt_apellido_m" id="txt_apellido_m"></td>
          </tr>
		      <tr>
              <td>Domicilio:&nbsp;</td>
              <td><input required type="text" name="txt_domicilio" id="txt_domicilio"></td>
          </tr>
		      <tr>
              <td>Fono:&nbsp;</td>
              <td><input required type="text" name="txt_fono" id="txt_fono"></td>
          </tr>
		      <tr>
              <td>Nacionalidad:&nbsp;</td>
              <td><input required type="text" name="txt_nacionalidad" id="txt_nacionalidad"></td>
          </tr>
		      <tr>
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
   <input type="button" value="Nuevo Medico" onClick="mostarFormularioCrear()" >

   <div id="contenedorListadoMedicos"></div>

</center>

</div>

<?php
   libreriasComunes();
 ?>





<script>



  function cargarMedicos(){

    $.ajax({
       url:"./medicos/mostrarMedicos.php",
       success:function(respuesta){
          $("#contenedorListadoMedicos").html(respuesta);
       }
    });

  }

  cargarMedicos();//carga la funcion al abrir la pagina


  function eliminarMedico(rut){

    $.ajax({
      url:"./medicos/eliminarMedico.php?rut="+rut,
      success:function(respuesta){

         if(respuesta==1){
            alert("Eliminado Correctamente");
            cargarMedicos();
         }else if(respuesta==2){
            alert("Ocurrio un error al eliminar.");
         }else{
            alert(respuesta);
         }

      }
    });
  }


  function mostarFormularioCrear(){
      $("#formularioCrearMedico")[0].reset();

      $("#cortinaModal").removeClass("oculto");
      $("#ventanaFormularioCrearMedico").removeClass("oculto");
  }
  function ocultarFormularioCrear(){
    $("#cortinaModal").addClass("oculto");
      $("#ventanaFormularioCrearMedico").addClass("oculto");
  }


//INSERTAR o MODIFICA MEDICO
  $("#formularioCrearMedico").submit(function(event){
       event.preventDefault();
       //alert("se detuvo");


       $.ajax({
         url:"./medicos/insertarMedico.php",
         data:$("#formularioCrearMedico").serialize(),
         success:function(respuesta){
           //alert(respuesta);
           if(respuesta==1){
              alert("Guardado Correctamente");
              ocultarFormularioCrear();
              cargarMedicos();

           }else if(respuesta==2){

              alert("Ocurrio un error al crear.");

           }
         }
       });

  });

  function datosUnMedico(rut){
     mostarFormularioCrear();


     $.ajax({
        url:"./medicos/datosUnMedico.php?txt_rut="+rut,
        success:function(respuesta){
          var datosRecibidos= respuesta.split(",");

          var rut=datosRecibidos[0];
          var nombre=datosRecibidos[1];
          var apellidoP=datosRecibidos[2];
          var apellidoM=datosRecibidos[3];
          var domicilio=datosRecibidos[4];
          var fono=datosRecibidos[5];
          var nacionalidad=datosRecibidos[6];


          $('#txt_rut').val(rut);
          $('#txt_nombre').val(nombre);
          $('#txt_apellido_P').val(apellidoP);
          $('#txt_apellido_m').val(apellidoM);
          $('#txt_domicilio').val(domicilio);
          $('#txt_fono').val(fono);
          $('#txt_nacionalidad').val(nacionalidad);
        }
     });
  }


</script>
</body>
</html>
