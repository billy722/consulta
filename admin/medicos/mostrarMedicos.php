<?php
require '../comun.php';
conectar();
 ?>

 <table class="tablaListado" >
   <thead>
     <th>Rut</th>
     <th>Fecha Ingreso</th>
     <th>Nombre</th>
     <th>Apellido Paterno</th>
     <th>Apellido Materno</th>
     <th>Domicilio</th>
     <th>Fono</th>
     <th>Nacionalidad</th>
   </thead>
   <tbody>

     <?php
       $consulta="SELECT * FROM medico;";
       $listaMedicos=$con->query($consulta);

         while($filas= $listaMedicos->fetch_array()){
            echo "<tr>";
                  echo "<td>".$filas['rut_medico']."</td>";
                  echo "<td>".$filas['fecha_ing']."</td>";
                  echo "<td>".$filas['nombre_m']."</td>";
                  echo "<td>".$filas['apellido_p_m']."</td>";
                  echo "<td>".$filas['apellido_m_m']."</td>";
                  echo "<td>".$filas['domicilio']."</td>";
                  echo "<td>".$filas['fono']."</td>";
                  echo "<td>".$filas['nacionalidad']."</td>";

                  echo '<td> <input type="button" value="Modificar" onclick="datosUnMedico('.$filas['rut_medico'].')" /> </td>';
                  echo '<td> <input type="button" value="Eliminar" onclick="eliminarMedico('.$filas['rut_medico'].')" /> </td>';
            echo "</tr>";
         }
      ?>

   </tbody>
 </table>
