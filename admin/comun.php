<?php

function conectar(){
  global $con;
  $servidor="localhost";
  $usuario="root";
  $clave="";
  $basdeDatos="consulta_doctor";

  $con = new mysqli($servidor,$usuario,$clave,$basdeDatos);

  if($con===false){
        die("ERROR, no se pudo conectar: ".mysqli_connect_error());
  }

}

function libreriasComunes(){
  ?>
    <script type="text/javascript" src="../js/jquery-3.1.0.min.js" ></script>

  <?php
}

function menuComun(){
  ?>

  <nav class="navLateral">
        <ul class="nav">
          <li><a href="">Horas Medicas</a>
            <ul>
              <li><a href="mantenedorReservas.php">Reservar Hora Médica</a></li>
            </ul>
          </li>

         <li><a href="">Consultas</a>
            <ul>
              <li><a href="mantenedorConsultas.php">Atender Consulta</a></li>
            </ul>
          </li>

  	  	 <li><a href="">Doctores</a>
  	  			<ul>
  					<li><a href="mantenedorMedico.php">Mantenedor Doctores</a></li>
  				</ul>
  			</li>

  			<li><a href="">Pacientes</a>
  				<ul>
  					<li><a href="mantenedorPacientes.php">Mantenedor Pacientes</a></li>
  					<li><a href="mantenedorAntecedente.php">Antecedentes del Paciente</a></li>
  				</ul>
  			</li>

        <li><a href="">Examenes</a>
  				<ul>
  					<li><a href="">Mantenedor examenes</a></li>
  				</ul>
  			</li>

        <li><a href="">Estado</a>
  				<ul>
  					<li><a href="mantenedorEstado.php">Mantenedor Estado</a></li>
  				</ul>
  			</li>

        <li><a href="">Informes</a>
  				<ul>
  					<li><a href="">Informe 1</a></li>
  					<li><a href="">Informe 2</a></li>
  					<li><a href="">Informe 3</a></li>
  				</ul>
  			</li>

  	  </ul>
  </nav>

  <?php
}
 ?>
