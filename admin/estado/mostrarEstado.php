<?php
require '../comun.php';
conectar();
 ?>

 <table class="tablaListado" >
   <thead>
     <th>Codigo</th>
     <th>Estado</th>
   </thead>
   <tbody>

     <?php
       $consulta="SELECT * FROM estado;";
       $listaMedicos=$con->query($consulta);

         while($filas= $listaMedicos->fetch_array()){
            echo "<tr>";
                  echo "<td>".$filas['id_estado']."</td>";
                  echo "<td>".$filas['tipo_estado']."</td>";
                  

                  echo '<td> <input type="button" value="Modificar" onclick="datosUnEstado('.$filas['id_estado'].')" /> </td>';
                  echo '<td> <input type="button" value="Eliminar" onclick="eliminarEstado('.$filas['id_estado'].')" /> </td>';
            echo "</tr>";
         }
      ?>

   </tbody>
 </table>
