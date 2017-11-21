<?php
    session_start();
     require_once 'conexion.php';
      $conexion = new Conexion();
      $cnn = $conexion->getConexion();
      $diaElegido = $_REQUEST['idDia'];  echo "dia-------------------".$diaElegido." <br>    " ;
      $horaElegida = $_REQUEST['idHora'];  echo "hora elegida----- ".$horaElegida."<br>";
      $diaSemana = date("w"); echo "dia Semana ---".$diaSemana."<br>";
      $diaHoyNum = date("z"); echo "dia del anio en numero ".$diaHoyNum,"<br>";
      $array_turnos = array(); echo "array turnos";
      foreach($array_turnos as $turno)
        {
        echo $turno . " ";
        } 
      echo "<br>";
      
      $contador = 0;
      $indicador = 0;
    function localizarDia($diaElegido,$diaSemana,$diaHoyNum,$horaElegida,$array_turnos,$contador,$indicador)
    {
        if ($diaElegido == $diaSemana){
            while($diaHoyNum <= 365){
              // if (($diaHoyNum+7)>365 ) {
              //   return $array_turnos;
              //   foreach($array_turnos as $turno)
              //   {
              //   echo $turno . "<br>";
              //   } 
              // }
              if($indicador == 0){
                  $diaHoyNum+=7; 
                  echo "dia igual a semana ".$diaHoyNum."<br>";
                  array_push($array_turnos,$diaHoyNum,$horaElegida);
              }
              if ($indicador == 1) {
                $diaHoyNum = $diaHoyNum - $contador;
                $diaHoyNum+=7; 
                array_push($array_turnos,$diaHoyNum,$horaElegida);
              }
              else{
                $diaHoyNum = $diaHoyNum + $contador;
                $diaHoyNum+=7; 
                array_push($array_turnos,$diaHoyNum,$horaElegida);
              }
            }
          foreach($array_turnos as $turno)
            {
            echo $turno . "<br>";
            } 
          return $array_turnos;
        } 
        if($diaElegido < $diaSemana){
          $indicador = 1;
          $diaElegido+=1;
          $contador+=1;
          localizarDia( $diaElegido, $diaSemana, $diaHoyNum, $horaElegida, $array_turnos,$contador,$indicador);
        }
        else{
          $indicador = 2;
          $diaElegido-=1;
          $contador+=1;
          localizarDia( $diaElegido, $diaSemana, $diaHoyNum, $horaElegida, $array_turnos,$contador,$indicador);
        } 

    }
localizarDia($diaElegido,$diaSemana,$diaHoyNum,$horaElegida,$array_turnos,$contador,$indicador);
echo "turnos despues "."<br>";
foreach($array_turnos as $turno)
  {
  echo $turno . " ";
  }

//   $diasTurnos = array();
//   $anioActual = date("Y");
//   //echo "anio actual  ".$anioActual;
//   //$mes =  date("m"); 
//   //echo "mes actual  ".$mes;
//   $diaNum = 322;
//   $date = DateTime::createFromFormat('z' , $diaNum);

// echo "numero del dia ".current($date)."<br>";
//   $dia = $_REQUEST['idDia'];
//   //echo "dia-------------------".$dia."     " ;
//   $hora = $_REQUEST['idHora'];
//   //echo "hora ---------------".$hora."      ";
//   $diaAnioCalendario = date("z");
//   $diaSemana = date("w");
//  echo "dia del anio       ".$diaAnioCalendario." <br>";
//  echo "dia semana         ".$diaSemana." <br>    ";
//   if($dia == $diaSemana){
//     while( $diaNum <= 365 ){
//           $diaAnioCalendario=+7;
//           $sql = "INSERT INTO turnos (id_consultorio,id_profesional,id_paciente,fecha,hora,id_estado) VALUES (1,1,1,$diaAnioCalendario,$idHora,1) ";
//           $statement = $cnn->prepare($sql);
//           $valor = $statement->execute();
//           }
//     };

//   echo "dia menos 1     " .$diaSemana;


//  $array_turnos = array();  
//  foreach($array_turnos as $turno)
//      {
//      echo $turno . " ";
//      }

 
//  array_push($array_turnos,$diaAnioCalendario,$hora); 
//  foreach($array_turnos as $turno)
//      {
//      echo $turno . " ";
//      }


$conexion = null;