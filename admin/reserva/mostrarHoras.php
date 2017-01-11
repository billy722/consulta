<?php
require '../comun.php';
conectar();
 ?>


 <table class="tablaListado" >
   <thead>
     <th>Codigo</th>
     <th>Hora</th>
     <th>Estado</th>
   </thead>
   <tbody>

<?php

$fechaRecibida= $_REQUEST['fecha'];

       $consulta="SELECT * FROM horas";
       $listaMedicos=$con->query($consulta);

         while($filas= $listaMedicos->fetch_array()){

           $consultaReservas="SELECT * FROM reserva where fecha='$fechaRecibida' and hora=".$filas['id_hora']." and id_estado=1";
           $listadoReservas=$con->query($consultaReservas);

               if($listadoReservas->num_rows>0){
                       echo '<tr style="background: rgba(164, 164, 164, 0.85);" >';
                }else{
                    echo '<tr style="background: rgba(165, 217, 56, 0.65);" >';
                }
                            echo "<td>".$filas['id_hora']."</td>";
                            echo "<td>".$filas['hora']."</td>";

              if($listadoReservas->num_rows>0){
                    $filasReserva= $listadoReservas->fetch_array();

                    echo '<td> <label for="">No disponible</label> </td>';
                    echo '<td> <input type="button" value="Cancelar" onclick="cancelarReserva('.$filasReserva['id_reserva'].')" /> </td>';
                }else{
                    echo '<td> <label for="">Dispobible</label> </td>';
                    echo '<td> <input type="button" value="Reservar" onclick="mostarFormularioCrear('.$filas['id_hora'].',\''.$fechaRecibida.'\')" /> </td>';
                }
                      echo "</tr>";

         }
      ?>

   </tbody>
 </table>
