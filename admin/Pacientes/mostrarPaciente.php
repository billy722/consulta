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
	 <th>Sexo</th>
	 <th>Fecha Nacimiento</th>
     <th>Domicilio</th>
     <th>Fono</th>
     <th>Nacionalidad</th>
   </thead>
   <tbody>

     <?php
       $consulta="SELECT * FROM paciente;";
       $listaMedicos=$con->query($consulta);

         while($filas= $listaMedicos->fetch_array()){
            echo "<tr>";
                  echo "<td>".$filas['rut_p']."</td>";
                  echo "<td>".$filas['fecha_ing']."</td>";
                  echo "<td>".$filas['nombre_p']."</td>";
                  echo "<td>".$filas['apellido_p_p']."</td>";
                  echo "<td>".$filas['apellido_m_p']."</td>";
				  echo "<td>".$filas['sexo_p']."</td>";
				  echo "<td>".$filas['fecha_nacto_p']."</td>";
                  echo "<td>".$filas['domicilio']."</td>";
                  echo "<td>".$filas['fono']."</td>";
                  echo "<td>".$filas['nacionalidad']."</td>";

                  echo '<td> <input type="button" value="Modificar" onclick="datosUnMedico('.$filas['rut_p'].')" /> </td>';
                  echo '<td> <input type="button" value="Eliminar" onclick="eliminarMedico('.$filas['rut_p'].')" /> </td>';
            echo "</tr>";
         }
      ?>

   </tbody>
 </table>
