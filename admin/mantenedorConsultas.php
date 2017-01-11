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

    <form  name="formularioCrearConsulta" id="formularioCrearConsulta">
        <table class="tabla" align="center">
          <tr>
              <td>Id:&nbsp;</td>
              <td><input type="text" name="txt_codigo" id="txt_codigo" maxlength="10"  placeholder=""></td>
          </tr>
          <tr>
              <td>Sintoma:&nbsp;</td>
              <td><input required type="text" name="txt_sintoma" id="txt_sintoma" maxlength="10"  placeholder=""></td>
          </tr>
          <tr>
              <td>Observación:&nbsp;</td>
              <td><input required type="text" name="txt_observacion" id="txt_observacion" maxlength="10"  placeholder=""></td>
          </tr>
          <tr>
              <td>Receta:&nbsp;</td>
              <td><input required type="text" name="txt_receta" id="txt_receta" maxlength="10"  placeholder=""></td>
          </tr>
          <tr>
              <td>Médico:&nbsp;</td>
              <td>
                <?php
                abre select
                $consulta="SELECT * FROM horas";
                $listaMedicos=$con->query($consulta);

                  while($filas= $listaMedicos->fetch_array()){
                  echo aqui van los option
                  }
                  cierra see
                 ?>
              </td>
          </tr>
		  <tr>
        nombre
        rut en imput
              <td>Paciente:&nbsp;</td>
              <td><input required type="text" name="txt_paciente" id="txt_paciente"></td>
          </tr>
          <tr>
                  <td>Paciente:&nbsp;</td>
                  <td><input required type="text" name="txt_paciente" id="txt_paciente"></td>
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
           url:"./consultas/mostrarConsultas.php?fecha="+fecha,
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


  function mostarFormularioCrear(id_reserva,idHora,fecha){
    //alert("hora es: "+idHora+" fecha es: "+fecha);
      $("#formularioCrearConsulta")[0].reset();

      $("#cortinaModal").removeClass("oculto");
      $("#ventanaFormularioCrearEstado").removeClass("oculto");

      //$("#txt_id_reserva_oculto").val(id_reserva);

      $.ajax({
         url:"./consultas/datoUnaConsulta.php?txt_codigo="+id_reserva,
         success:function(respuesta){
           var datosRecibidos= respuesta.split(",");

rut paciente
nombre paciente
           var rut=datosRecibidos[0];
           var nombrePaciente=datosRecibidos[1];



           $('#txt_codigo').val(codigo);
           $('#txt_sintoma').val(sintoma);


         }
      });
  }
  function ocultarFormularioCrear(){
    $("#cortinaModal").addClass("oculto");
      $("#ventanaFormularioCrearEstado").addClass("oculto");
  }


//INSERTAR o MODIFICA ESTADO
  $("#formularioCrearConsulta").submit(function(event){
       event.preventDefault();
       //alert("se detuvo");


       $.ajax({
         url:"./consultas/insertarConsulta.php",
         data:$("#formularioCrearConsulta").serialize(),
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

   function datoUnaConsulta(codigo){
     mostarFormularioCrear();


     $.ajax({
        url:"./consultas/datoUnaConsulta.php?txt_codigo="+codigo,
        success:function(respuesta){
          var datosRecibidos= respuesta.split(",");

          var codigo=datosRecibidos[0];
          var sintoma=datosRecibidos[1];
          var observacion=datosRecibidos[2];
          var receta=datosRecibidos[3];
          var rut_medico=datosRecibidos[4];
          var rut_p=datosRecibidos[5];


          $('#txt_codigo').val(codigo);
          $('#txt_sintoma').val(sintoma);
          $('#txt_observacion').val(observacion);
          $('#txt_receta').val(receta);
          $('#txt_medico').val(rut_medico);
          $('#txt_paciente').val(rut_p);

        }
     });
  }



</script>
</body>
</html>
