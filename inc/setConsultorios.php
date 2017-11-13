<?php

session_start();
require_once 'conexion.php';

$consultorios = json_decode($_POST["json"]); // recibo json y lo decodifico

$conexion = new Conexion();
$cnn = $conexion->getConexion(); //obtengo conexion
$sql= "INSERT INTO consultorios(ubicacion, estado) values(?,?);";
$statement = $cnn->prepare($sql);

$respuesta=false;
var_dump($consultorios->{"data"}); //asi accedo al array var_dump es para enviar al cliente y mediante js mostrar en consola
foreach($consultorios->{"data"} as $consultorio){
    echo $consultorio->{"id_consultorio"};
    echo $consultorio->{"ubicacion"};
    echo $consultorio->{"estado"};
    
    $statement->bindParam(2, $consultorio->{"ubicacion"},PDO::PARAM_STR); //1,2,3 hacen reperencia a los ? puestos en la consulta
    $statement->bindParam(3, $consultorio->{"estado"},PDO::PARAM_INT);
    
    $respuesta=$statement->execute();

    }

echo $respuesta;

