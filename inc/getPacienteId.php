<?php
session_start();
require_once 'conexion.php';

$datos = json_decode($_POST["json"]); // recibo json y lo decodifico



$conexion = new Conexion();
$cnn = $conexion->getConexion(); //obtengo conexion
$sql= "select* from paciente where Id_paciente = :id;";
$statement = $cnn->prepare($sql);

$respuesta=false;

foreach($datos->{"data"} as $paciente){
    
    $statement->bindParam(':id', $paciente->{"id"},PDO::PARAM_INT); //1,2,3 hacen reperencia a los ? puestos en la consulta
    
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