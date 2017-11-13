<?php

session_start();
require_once 'conexion.php';

$personas = json_decode($_POST["json"]); // recibo json y lo decodifico

$conexion = new Conexion();
$cnn = $conexion->getConexion(); //obtengo conexion
$sql= "UPDATE personas_cargo SET nombre = :nombre, apellido = :apellido, dni = :dni, direccion = :direccion, telefono=:telefono WHERE id_personaCargo = :id;";
$statement = $cnn->prepare($sql);

$respuesta=false;

//echo $personas;
//var_dump($personas->{"data"}); //asi accedo al array var_dump es para enviar al cliente y mediante js mostrar en consola
foreach($personas->{"data"} as $persona){
    //echo $persona->{"id_personaCargo"};
    
    //echo $persona->{"nombre"};
    //echo $producto->{"precio"};
    
    $statement->bindParam(":id", $persona->{"id_personaCargo"},PDO::PARAM_INT); 
    $statement->bindParam(":nombre", $persona->{"nombre"},PDO::PARAM_STR); 
    $statement->bindParam(":apellido", $persona->{"apellido"},PDO::PARAM_STR);
    $statement->bindParam(":dni", $persona->{"dni"},PDO::PARAM_INT);
    $statement->bindParam(":direccion", $persona->{"direccion"},PDO::PARAM_STR);    
    $statement->bindParam(":telefono", $persona->{"telefono"},PDO::PARAM_INT);
    
    $respuesta=$statement->execute();

    }

echo $respuesta;




?>