<?php
session_start();
require_once 'conexion.php';

$datos = json_decode($_POST["json"]); // recibo json y lo decodifico



$conexion = new Conexion();
$cnn = $conexion->getConexion(); //obtengo conexion
$sql= "select* from personas_cargo where id_personaCargo = :id;";
$statement = $cnn->prepare($sql);

$respuesta=false;

foreach($datos->{"data"} as $paciente){
    
    $statement->bindParam(':id', $paciente->{"id"},PDO::PARAM_INT); 
    
    $respuesta=$statement->execute();
}
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