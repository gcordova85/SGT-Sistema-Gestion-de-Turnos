<?php
session_start();
require_once 'conexion.php';

$id = $_REQUEST["idPaciente"];


$conexion = new Conexion();
$cnn = $conexion->getConexion(); //obtengo conexion
$sql= "SELECT CONCAT(CONCAT(pc.nombre,', '), pc.apellido) as persona,pc.direccion, pc.telefono FROM personas_cargo pc
INNER JOIN paciente_personacargo pp on pc.id_personaCargo = pp.id_personaCargo
INNER JOIN pacientes pa on pa.id_paciente = pp.id_paciente
WHERE pa.id_paciente = $id;";
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