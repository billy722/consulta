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


    <script>

      function soloNumerosyK(e)
      {
          var keynum = window.event ? window.event.keyCode : e.which;

           if ((keynum == 8) || (keynum ==45) || (keynum ==107)|| (keynum ==75)){
                  return true;
           }else{

              return /\d/.test(String.fromCharCode(keynum));
          }
      }


      function validaRut(str)
      {
          var rut = str.replace(/\./gi, "");

          //Valor acumulado para el calculo de la formula
          var nAcumula = 0;
          //Factor por el cual se debe multiplicar el valor de la posicion
          var nFactor = 2;
          //Dígito verificador
          var nDv = 0;

          //extraemos el digito verificador (La K corresponde a 10)
          if(rut.charAt(rut.length-1).toUpperCase()=='K'){
              nDvReal = 10;
          //el 0 corresponde a 11
          }else{
                  if(rut.charAt(rut.length-1)==0){
                      nDvReal = 11;
                  }else{
                      nDvReal = rut.charAt(rut.length-1);
                  }
          }

                 for(nPos=rut.length-2; nPos>0; nPos--){

                          var numero = rut.charAt(nPos-1).valueOf();
                          nAcumula =nAcumula+( numero*nFactor);

                          nFactor= nFactor+1;
                          if (nFactor==8){
                               nFactor = 2;
                          }

                  }

         nDv = 11-(nAcumula%11);

          if (nDv == nDvReal){
                  return true;
          }else{
              return false;
          }

      }


      function formatearRut(str)
    {

         var temp = str.replace(/\./gi,"");//quita los puntos al rut
         temp = temp.replace(/\-/gi,"");    //quita el guion al rut
         var sRut1=temp;


                        var nPos = 0; //Guarda el rut invertido con los puntos y el guión agregado
                        var sInvertido = ""; //Guarda el resultado final del rut como debe ser
                        var sRut = "";

                         for(var i=sRut1.length-1; i>= 0; i-- )
                        {
                            sInvertido += sRut1.charAt(i);
                            if (i==sRut1.length-1){

                                sInvertido += "-";
                            }else if (nPos == 3){

                                sInvertido += ".";
                                nPos = 0;
                            }
                            nPos++;
                        }
                        for(var j = sInvertido.length - 1; j>= 0; j-- )
                        {
                            if (j != sInvertido.length ){
                                sRut += sInvertido.charAt(j);
                            }
                        }


        document.getElementById("rut").value=sRut;
        validaRut(sRut);
    }
    </script>

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
