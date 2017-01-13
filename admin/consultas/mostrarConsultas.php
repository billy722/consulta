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
                 $filasReserva= $listadoReservas->fetch_array();
                   echo '<tr style="background: rgba(164, 164, 164, 0.85);" >';

                            echo "<td>".$filas['id_hora']."</td>";
                            echo "<td>".$filas['hora']."</td>";



                    echo '<td> <label for="">Disponible</label> </td>';
                    echo '<td> <input type="button" value="Atender" onclick="mostarFormularioCrear('.$filasReserva['id_reserva'].','.$filas['id_hora'].',\''.$fechaRecibida.'\')" /> </td>';
                    echo "</tr>";
                }

         }
      ?>

   </tbody>
 </table>
