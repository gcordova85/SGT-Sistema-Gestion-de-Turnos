<?php
 session_start();
 require_once 'conexion.php';

 $conexion = new Conexion();
 $cnn = $conexion->getConexion();
 $fechaHoy= date('Y/m/d');
 $sql = "SELECT CONCAT(CONCAT(pa.nombre,', '), pa.apellido) as paciente, 
 CONCAT(CONCAT(pr.nombre,', '), pr.apellido) as profesional, 
 CONCAT(CONCAT(c.id_consultorio,', '), c.ubicacion) as consultorio, 
 t.fecha as fecha, h.hora as hora
 FROM turnos t 
 INNER JOIN pacientes pa on pa.id_paciente = t.id_paciente 
 INNER JOIN pdc on t.id_pdc = pdc.id_pdc 
 INNER JOIN consultorios c on c.id_consultorio = pdc.id_consultorio 
 INNER JOIN profesionales pr on pr.id_profesional = pdc.id_profesional 
 INNER JOIN horarios h on t.id_hora = h.id_horario 
 WHERE t.estado=1 and t.fecha ='2017-11-25' #$fechaHoy";#'2017-11-25'
 $statement = $cnn->prepare($sql);
 $valor = $statement->execute();
 $contar = $statement->rowCount(); 
 if($contar <> 0){
    while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
        $data["data"][] = $resultado;
        
 }echo json_encode($data);
}
 else{
        echo '{"data":[{"paciente":"","profesional":"","consutorio":"","fecha":"","hora":""}]}';
    }
    
 
 $statement->closeCursor();
 $conexion = null;
