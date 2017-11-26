<?php
 session_start();
 require_once 'conexion.php';

 $conexion = new Conexion();
 $cnn = $conexion->getConexion();
 $sql = "SELECT DISTINCT id_horario ,hora
        FROM horarios 
        WHERE NOT EXISTS 
        (SELECT * FROM turnos
                   INNER JOIN pdc ON pdc.id_pdc = turnos.id_pdc
                   WHERE turnos.id_hora = horarios.id_horario and turnos.estado = 1 and pdc.id_pdc = :id_pdc);";
 $statement = $cnn->prepare($sql);
 $statement->bindParam(':id_pdc', $_REQUEST['idPDC']);
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