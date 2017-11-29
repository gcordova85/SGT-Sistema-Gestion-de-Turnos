<?php
    session_start();
    require_once 'conexion.php';

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();
    $sql = "SELECT CONCAT(CONCAT(Pa.nombre,', '), Pa.apellido) AS paciente, T.fecha, 
	CONCAT(CONCAT(Pr.nombre,', '),Pr.apellido) AS 'profesional', 
    CONCAT(CONCAT(C.id_consultorio,' - '),C.ubicacion) As 'consultorio',
    H.hora , D.nombre AS 'dia', T.estado
    FROM turnos T
	INNER JOIN horarios H ON h.id_horario = t.id_hora
    INNER JOIN pdc P on P.id_pdc = T.id_pdc
	INNER JOIN profesionales Pr on Pr.id_profesional = P.id_profesional
    INNER JOIN consultorios C on C.id_consultorio = P.id_consultorio
    INNER JOIN dias D on D.id_dia = p.id_dia
    INNER JOIN pacientes Pa on Pa.id_paciente = T.id_paciente
    WHERE t.fecha < :fecha";
    $fecha=new DateTime();
    $fecha = substr(current($fecha), 0, -16);
    $statement = $cnn->prepare($sql);
    $statement->bindParam(':fecha', $fecha);
    $valor = $statement->execute();
    if($valor){
        while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
            $data["data"][] = $resultado;
        }
    echo json_encode($data);
    }else{
        echo "error";
    }
    $statement->closeCursor();
    $conexion = null;