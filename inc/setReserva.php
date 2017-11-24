<?php
    session_start();
     require_once 'conexion.php';
      date_default_timezone_set('America/Argentina/Buenos_Aires');
      $conexion = new Conexion();
      $cnn = $conexion->getConexion();
      //VARIABLES PARA CONSULTA
      $idEstado = 1;
      $idPaciente = $_REQUEST['idPaciente'];
      $idConsultorio = $_REQUEST['idConsultorio'];
      $idProfesional = $_REQUEST['idProfesional'];
      $diaElegido = $_REQUEST['idDia']; 
      $horaElegida = $_REQUEST['idHora']; 
      //VARIABLES PARA IDENTIFICAR DIA
      $diaSemana = date("w"); 
      $diaHoyNum = date("z");
      $anioActual = date('Y'); 
      $contador = 0;
      $indicador = 0;

function devolverFechaStr($diaHoyNum){
  $date = DateTime::createFromFormat('z' , $diaHoyNum);
  $date = $date->format("d-m");
  return $date;
}
function consulta($idConsultorio,$idProfesional,$idPaciente,$diaAgregar,$horaElegida,$idEstado,$anioActual,$cnn){
  $sql="INSERT INTO turnos (id_consultorio, id_profesional,id_Paciente,fecha,id_hora,estado,anio)
    VALUES ($idConsultorio,$idProfesional,$idPaciente,$diaAgregar,$horaElegida,$idEstado,$anioActual)";
  $query = $cnn->prepare($sql);
  $resultado = $query->execute();
}
function localizarDia($diaElegido,$diaSemana,$diaHoyNum,$contador,$indicador){
    if ($diaElegido == $diaSemana){
        if($indicador == 0){
            $diaHoyNum+=7; 
            return $diaHoyNum;
            
        }
        if ($indicador == 1) {
          $diaHoyNum = $diaHoyNum - $contador;
          $diaHoyNum+=7; 
          return $diaHoyNum;
          
        }
        if ($indicador == 2) {
          $diaHoyNum = $diaHoyNum + $contador;
          $diaHoyNum+=7; 
          return $diaHoyNum;
          
        }
    } 
    if($diaElegido < $diaSemana){
    $indicador = 1;
    $diaElegido+=1;
    $contador+=1;
    localizarDia($diaElegido,$diaSemana,$diaHoyNum,$contador,$indicador);
    }
    if($diaElegido > $diaSemana){
    $indicador = 2;
    $diaElegido-=1;
    $contador+=1;
    localizarDia($diaElegido,$diaSemana,$diaHoyNum,$contador,$indicador);
    } 
}
var_dump(localizarDia($diaElegido,$diaSemana,$diaHoyNum,$contador,$indicador));

// while($diaAgregar < 358){
//   consulta($idConsultorio,$idProfesional,$idPaciente,$diaAgregar,$horaElegida,$idEstado,$anioActual,$cnn);
//   $diaAgregar+=7;
// }
echo 1;
$conexion = null;