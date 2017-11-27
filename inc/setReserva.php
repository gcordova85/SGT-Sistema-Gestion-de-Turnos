<?php
    session_start();
    require_once 'conexion.php';
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $conexion = new Conexion();
        $cnn = $conexion->getConexion();
        $diaSemana =date("w"); echo "Devuelve dia semana de hoy ".$diaSemana."<br>";
        $diasSumar=7;
        $fechasTurnos = array();
        $diaElegido = $_REQUEST['idDia']; 
        $horaElegida = $_REQUEST['idHora']; 
        $diaSemana =(date("w"));
        $diaActual = date('Y-m-d');
        $fechaAgregar =  date('Y-m-d');
        $anioActual = date('Y'); 
        $limite = $anioActual."-12-25";
        $contador = 0;
        $indicador = 0;

    while($fechaAgregar < $limite){
         if($diaElegido == $diaSemana){
              switch ($indicador) {
                case 0:
                  $fechaAgregar =  date('Y-m-d', strtotime('+'.$diasSumar.' day')) ;
                  array_push($fechasTurnos,"fecha",$fechaAgregar);                 
                  $diasSumar += 7;  
                case 1:
                    $nuevafecha = strtotime ( '-'.$contador.' day' , strtotime ( $fechaAgregar ) ) ;
                    $fechaAgregar = date ( 'Y-m-d' , $nuevafecha );
                    $fechaAgregar =  date('Y-m-d', strtotime('+'.$diasSumar.' day'));
                    $contador = 0;
                    $diasSumar += 7;
                    array_push($fechasTurnos,"fecha",$fechaAgregar);
                    break;
                case 2:
                  $nuevafecha = strtotime ( '+'.$contador.' day' , strtotime ( $fechaAgregar ) ) ;
                  $fechaAgregar = date ( 'Y-m-d' , $nuevafecha );
                  $fechaAgregar =  date('Y-m-d', strtotime('+'.$diasSumar.' day'));
                  array_push($fechasTurnos,"fecha",$fechaAgregar);
                  $contador = 0;
                  $diasSumar += 7;
            }

         }
         elseif ($diaElegido >= $diaSemana){
            $indicador = 1;
            $contador += 1;
            $fechaAgregar =  date('Y-m-d', strtotime('+1 day'));
            
         }
         elseif ($diaElegido <= $diaSemana){
          $indicador = 2;
          $contador += 1;
          $fechaAgregar =  date('Y-m-d', strtotime('+1 day'));          
         }

    }
echo $fechasTurnos;

function insertTurnos($idPDC,$idPaciente,$fecha,$idHora,$cnn){
  $sql="INSERT INTO turnos (Id_consultorio, Id_profesional,Id_Paciente,fecha,id_hora,id_estado)
    VALUES ($idPDC,$idPaciente,$fecha,$idHora,$idEstado)";
  $query = $cnn->prepare($sql);
  $query->execute();
}



































      //VARIABLES PARA CONSULTA
//       $idEstado = 1;
//       $idPaciente = $_REQUEST['idPaciente'];
//       $idConsultorio = $_REQUEST['idConsultorio'];
//       $idProfesional = $_REQUEST['idProfesional'];
//       $diaElegido = $_REQUEST['idDia']; 
//       $horaElegida = $_REQUEST['idHora']; 
//       //VARIABLES PARA IDENTIFICAR DIA
//       $diaSemana = date("w"); 
//       $diaHoyNum = date("z");
//       $anioActual = date('Y'); 
//       $contador = 0;
//       $indicador = 0;

// function devolverFechaStr($diaHoyNum){
//   $date = DateTime::createFromFormat('z' , $diaHoyNum);
//   $date = $date->format("d-m");
//   return $date;
// }
// function consulta($idConsultorio,$idProfesional,$idPaciente,$diaAgregar,$horaElegida,$idEstado,$anioActual,$cnn){
//   $sql="INSERT INTO turnos (id_consultorio, id_profesional,id_Paciente,fecha,id_hora,estado,anio)
//     VALUES ($idConsultorio,$idProfesional,$idPaciente,$diaAgregar,$horaElegida,$idEstado,$anioActual)";
//   $query = $cnn->prepare($sql);
//   $resultado = $query->execute();
// }
// function localizarDia($diaElegido,$diaSemana,$diaHoyNum,$contador,$indicador){
//   if($diaElegido < $diaSemana){
//     $indicador = 1;
//     $diaElegido+=1;
//     $contador+=1;
//     echo $indicador.$diaElegido.$contador;
//     localizarDia($diaElegido,$diaSemana,$diaHoyNum,$contador,$indicador);
//     }
//     if($diaElegido > $diaSemana){
//     $indicador = 2;
//     $diaElegido-=1;
//     $contador+=1;
//     localizarDia($diaElegido,$diaSemana,$diaHoyNum,$contador,$indicador);
//     }
//     if ($diaElegido == $diaSemana){
//         if($indicador == 0){
//             $diaHoyNum+=7; 
//             return $diaHoyNum;
            
//         }
//         if ($indicador == 1) {
//           $diaHoyNum = $diaHoyNum - $contador;
//           $diaHoyNum =  $diaHoyNum + 7; 
//           $result=$diaHoyNum;
//           return $result;
          
//         }
//         if ($indicador == 2) {
//           $diaHoyNum = $diaHoyNum + $contador;
//           $diaHoyNum+=7; 
//           return $diaHoyNum;
          
//         }
//     } 
 
// }
//  $prueba=localizarDia($diaElegido,$diaSemana,$diaHoyNum,$contador,$indicador);
// echo "devolucion num".$prueba;
// // while($diaAgregar < 358){
// //   consulta($idConsultorio,$idProfesional,$idPaciente,$diaAgregar,$horaElegida,$idEstado,$anioActual,$cnn);
// //   $diaAgregar+=7;
// // }
$conexion = null;