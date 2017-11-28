<?php
    session_start();
    require_once('conexion.php');
    $conexion = new Conexion();
    $cnn = $conexion->getConexion();

// OBTENER PDC DE LOS DATOS 
$sql = "SELECT id_pdc
    FROM pdc 
    WHERE id_profesional = :id_profesional 
    and id_consultorio = :id_consultorio 
    and id_dia = :id_dia 
    and estado = 1";

    $sql = $cnn->prepare($sql);
    $sql->bindParam(':id_profesional', $_REQUEST['idProfesional']);
    $sql->bindParam(':id_consultorio', $_REQUEST['idConsultorio']);
    $sql->bindParam(':id_dia', $_REQUEST['idDia']);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    $idPDC = $row['id_pdc']; 

// VARIABLES PARA CONSULTA
    $estado = 1;
    $idPaciente = $_REQUEST['idPaciente'];
    $horaElegida =$_REQUEST['idHora']; 

//VARIABLES PARA CALCULAR FECHAS DEL TURNO
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $diaSemana =date("w");
    $diasSumar=7;
    $fechasTurnos = array();
    $diaElegido = $_REQUEST['idDia']; 
    $diaSemana =(date("w"));
    $anioActual = date('Y'); 
    $limite = $anioActual."/12/26";

//Estimar la primera fecha de dia asignado
    if ($diaElegido > $diaSemana){
        $intDiferenciaDeDias=$diaElegido-$diaSemana;
        }
    elseif ($diaElegido == $diaSemana){  
        $intDiferenciaDeDias=7;
        }
    else{
        $intDiferenciaDeDias=7-($diaSemana-$diaElegido);
        }
    $fechaBase=new DateTime();
    $fechaBase->modify('+'.$intDiferenciaDeDias.'day');
    $objLimiteFecha=new DateTime($limite);  

    //Estimar todas las fechas
    while($fechaBase <= $objLimiteFecha){
        $objFecha=new stdClass();
        $objFecha->fecha=$fechaBase->format('Y-m-d');
        array_push($fechasTurnos,$objFecha);
        $fechaBase->modify('+7 day');
    }

//CONSULTA INSERT CON LA FECHAS
foreach($fechasTurnos as $key => $value){
   foreach($value as $key => $fecha){
        $sql = "INSERT INTO `turnos` (`id_turno`, `id_paciente`, `fecha`, `id_pdc`, `id_hora`, `estado`) VALUES (NULL, '$idPaciente', '$fecha', '$idPDC', '$horaElegida', '$estado')"; 
        $query = $cnn->prepare($sql);
        $query->execute();
        $registro = $query->rowCount();

   }
}


if($registro > 0){
    echo  1 ;
}
else{
    echo 0;
}
$cnn = null;