<?php
session_start();
require_once 'conexion.php';

$id = $_REQUEST["id"];


$conexion = new Conexion();
$cnn = $conexion->getConexion(); //obtengo conexion
$sql= "select* from turnos where id_paciente = $id;";
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