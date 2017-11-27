<?php

session_start();
require_once 'conexion.php';

$personas = json_decode($_POST["json"]); // recibo json y lo decodifico

$conexion = new Conexion();
$cnn = $conexion->getConexion(); //obtengo conexion
$sql= "UPDATE pacientes SET estado = '0' WHERE id_paciente = :id;";
$statement = $cnn->prepare($sql);

$respuesta=false;

//echo $personas;
//var_dump($personas->{"data"}); //asi accedo al array var_dump es para enviar al cliente y mediante js mostrar en consola
foreach($personas->{"data"} as $persona){
    //echo $persona->{"id_personaCargo"};
    
    echo $persona->{"id"};
    //echo $producto->{"precio"};
    
    $statement->bindParam(":id", $persona->{"id"},PDO::PARAM_INT); 
   
    
    $respuesta=$statement->execute();

    }

echo $respuesta;




?>