<?php
require '../comun.php';
conectar();
 ?>

 <table class="tablaListado" >
   <thead>
     <th>Codigo</th>
     <th>Antecedente</th>
   </thead>
   <tbody>

     <?php
       $consulta="SELECT * FROM antecedentes;";
       $listaMedicos=$con->query($consulta);

         while($filas= $listaMedicos->fetch_array()){
            echo "<tr>";
                  echo "<td>".$filas['id_ant']."</td>";
                  echo "<td>".$filas['tipo_ant']."</td>";
                  

                  echo '<td> <input type="button" value="Modificar" onclick="datosUnAntecedente('.$filas['id_ant'].')" /> </td>';
                  echo '<td> <input type="button" value="Eliminar" onclick="eliminarAntecedente('.$filas['id_ant'].')" /> </td>';
            echo "</tr>";
         }
      ?>

   </tbody>
 </table>
