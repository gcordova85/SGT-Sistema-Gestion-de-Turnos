<?php

session_start();
require_once 'conexion.php';

$personas = json_decode($_POST["json"]); // recibo json y lo decodifico

$conexion = new Conexion();
$cnn = $conexion->getConexion(); //obtengo conexion
$sql= "insert into personas_cargo(nombre, apellido, dni, direccion, telefono, estado) values(?,?,?,?,?,?);";
$statement = $cnn->prepare($sql);

$respuesta=false;

$enviar=true;

foreach($personas->{"data"} as $persona){
    $pattern='/([A-Za-zñáéíóú]{3,})\s*(([A-Za-zñáéíóú]{3,})){0,1}$/';   
    $success = preg_match($pattern, $persona->{"nombre"});
    if (!$success) {
        $enviar=false;
        }
}

foreach($personas->{"data"} as $persona){
    echo $persona->{"nombre"};  
    $statement->bindParam(1, $persona->{"nombre"},PDO::PARAM_STR); //1,2,3 hacen reperencia a los ? puestos en la consulta
    $statement->bindParam(2, $persona->{"apellido"},PDO::PARAM_STR);
    $statement->bindParam(3, $persona->{"dni"},PDO::PARAM_INT);
    $statement->bindParam(4, $persona->{"direccion"},PDO::PARAM_STR);    
    $statement->bindParam(5, $persona->{"telefono"},PDO::PARAM_INT);
    $statement->bindParam(6, $persona->{"estado"},PDO::PARAM_INT);
    }

    if ($enviar){
        $respuesta=$statement->execute();
        echo $respuesta;        
    }else{
        return "Error";
    }
    


