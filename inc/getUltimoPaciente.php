<?php
session_start();
require_once 'conexion.php';

$conexion = new Conexion();
$cnn = $conexion->getConexion(); //obtengo conexion
$sql= "SELECT MAX(id_paciente) id_paciente FROM paciente;";
$statement = $cnn->prepare($sql);

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