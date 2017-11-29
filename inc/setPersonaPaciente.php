<?php

session_start();
require_once 'conexion.php';

$personas = json_decode($_POST["json"]); // recibo json y lo decodifico

$conexion = new Conexion();
$cnn = $conexion->getConexion(); //obtengo conexion
$sql= "insert into paciente_personacargo(id_paciente, id_personaCargo) values(?,?);";
$statement = $cnn->prepare($sql);

$respuesta=false;


    foreach($personas->{"data"} as $persona){
        $statement->bindParam(1, $persona->{"idPaciente"},PDO::PARAM_INT); 
        $statement->bindParam(2, $persona->{"idPersona"},PDO::PARAM_INT);
        }
    $respuesta=$statement->execute();
    echo $respuesta;        
    
    


