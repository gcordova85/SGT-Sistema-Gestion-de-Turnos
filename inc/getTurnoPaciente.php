<?php
session_start();
require_once 'conexion.php';

$id = $_REQUEST["id"];


$conexion = new Conexion();
$cnn = $conexion->getConexion(); //obtengo conexion
$sql= "SELECT h.hora as hora, t.fecha as fecha, t.estado as estado from turnos t
INNER JOIN horarios h on h.id_horario = t.id_hora
WHERE t.id_paciente = $id and t.fecha <= :fecha;";
$fecha=new DateTime();
$fecha = substr(current($fecha), 0, -16);
$statement = $cnn->prepare($sql);
$statement->bindParam(':fecha', $fecha);
$respuesta=false;

 
$respuesta=$statement->execute();

    if($respuesta){
        while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
            $data["data"][] = $resultado;
        }
        echo json_encode($data);
    }else{
    }
    $statement->closeCursor();
    $conexion = null;

?>