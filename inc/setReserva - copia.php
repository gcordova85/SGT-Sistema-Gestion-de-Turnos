<?php
    session_start();
     require_once 'conexion.php';
      date_default_timezone_set('America/Argentina/Buenos_Aires');
      $conexion = new Conexion();
      $cnn = $conexion->getConexion();
      $idEstado = 1;
      $idPaciente = $_REQUEST['idPaciente'];
      $idConsultorio = $_REQUEST['idConsultorio'];
      $idProfesional = $_REQUEST['idProfesional'];
      $diaElegido = $_REQUEST['idDia'];  echo "dia-------------------".$diaElegido." <br>    " ;
      $horaElegida = $_REQUEST['idHora'];  echo "hora elegida----- ".$horaElegida."<br>";
      $diaSemana = date("w"); echo "dia Semana ---".$diaSemana."<br>";
      $diaHoyNum = date("z"); echo "dia del anio en numero ".$diaHoyNum,"<br>";
      $date = DateTime::createFromFormat('z' , $diaHoyNum);
      $date = $date->format("d-m-y");
      echo($date);
      $array_turnos = array(); echo "array turnos"; 
      $anioActual = date('Y'); echo "anio en numero ".$anioActual,"<br>";
      $contador = 0;
      $indicador = 0;
    function localizarDia($diaElegido,$diaSemana,$diaHoyNum,$horaElegida,$array_turnos,$contador,$indicador,$idConsultorio,$idProfesional,$idPaciente,$idEstado,$anioActual,$cnn)
    {
        if ($diaElegido == $diaSemana){
            while($diaHoyNum <= 358){
              if($indicador == 0){
                  $diaHoyNum+=7; 
                  echo "dia igual a semana ".$diaHoyNum."<br>";
                  array_push($array_turnos,$diaHoyNum,$horaElegida);
                  $diaAgregar = DateTime::createFromFormat('z' , $diaHoyNum);
                  $diaAgregar = $diaAgregar->format("Y-m-d");
                  consulta($idConsultorio,$idProfesional,$idPaciente,$diaAgregar,$horaElegida,$idEstado,$anioActual,$cnn);
              }
              if ($indicador == 1) {
                $diaHoyNum = $diaHoyNum - $contador;
                $diaHoyNum+=7; 
                array_push($array_turnos,$diaHoyNum,$horaElegida);
                $diaAgregar = DateTime::createFromFormat('z' , $diaHoyNum);
                consulta($idConsultorio,$idProfesional,$idPaciente,$diaAgregar,$horaElegida,$idEstado,$anioActual,$cnn);
                $contador = 0;
              }
              if ($indicador == 2) {
                $diaHoyNum = $diaHoyNum + $contador;
                array_push($array_turnos,$diaHoyNum,$horaElegida);
                $diaAgregar = DateTime::createFromFormat('z' , $diaHoyNum);
                $diaAgregar = $diaAgregar->format("d-m-Y");
                consulta($idConsultorio,$idProfesional,$idPaciente,$diaAgregar,$horaElegida,$idEstado,$anioActual,$cnn);
                $contador = 0;
                $diaHoyNum+=7; 
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
          localizarDia($diaElegido,$diaSemana,$diaHoyNum,$horaElegida,$array_turnos,$contador,$indicador,$idConsultorio,$idProfesional,$idPaciente,$idEstado,$anioActual,$cnn);
        }
        if($diaElegido > $diaSemana){
          $indicador = 2;
          $diaElegido-=1;
          $contador+=1;
          localizarDia($diaElegido,$diaSemana,$diaHoyNum,$horaElegida,$array_turnos,$contador,$indicador,$idConsultorio,$idProfesional,$idPaciente,$idEstado,$anioActual,$cnn);
        } 

    }
localizarDia($diaElegido,$diaSemana,$diaHoyNum,$horaElegida,$array_turnos,$contador,$indicador,$idConsultorio,$idProfesional,$idPaciente,$idEstado,$anioActual,$cnn);

function consulta($idConsultorio,$idProfesional,$idPaciente,$diaAgregar,$idHora,$idEstado,$anioActual,$cnn){
  $sql="INSERT INTO turnos (id_consultorio, id_profesional,id_Paciente,fecha,id_hora,estado,anio)
    VALUES ($idConsultorio,$idProfesional,$idPaciente,$diaAgregar,$idHora,$idEstado,$anioActual)";
  $query = $cnn->prepare($sql);
  $resultado = $query->execute();
  echo $resultado;
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