<?php
    session_start();
    require_once('conexion.php');
    $conexion = new Conexion();
    $cnn = $conexion->getConexion();

if($_SESSION['rol'] == 3){
    header("Location:mod/menu.php");
}
else {    

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
            $sqll = "SELECT `id_turno`, `id_paciente`, `fecha`, `id_pdc`, `id_hora`, `estado` 
            FROM `turnos` 
            WHERE `id_paciente` = :id_paciente
                and `fecha` = :fecha
                and `id_pdc`= :id_pdc
                AND `id_hora`= :id_hora
                AND estado = 1";
                $sql1 = $cnn->prepare($sqll);
                $sql1->bindParam(':id_paciente', $_REQUEST['idPaciente']);
                $sql1->bindParam(':id_hora', $_REQUEST['idHora']);
                $sql1->bindParam(':id_pdc', $_REQUEST['idPDC']);
                $sql1->bindParam(':fecha', $fecha);
                $sql1->execute();
                $registro = $sql1->rowCount();          
            if($registro > 0 ){
                echo 0;
            }
            else {
                $sql = "INSERT INTO `turnos` (`id_turno`, `id_paciente`, `fecha`, `id_pdc`, `id_hora`, `estado`) VALUES (NULL, '$idPaciente', '$fecha', '$idPDC', '$horaElegida', '$estado')"; 
                $query = $cnn->prepare($sql);
                $query->execute();
                $registro2 = $query->rowCount();
            }
    
        }
    }
    if($registro2 > 0){
        echo  1 ;
    }
    else{
        echo 0;
    }
}   
$cnn = null;