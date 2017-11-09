<?php

include 'Conexion.php';

$personas = json_decode($_POST["json"]); // recibo json y lo decodifico

$conexion = new Conexion();
$cnn = $conexion->getConexion(); //obtengo conexion
$sql= "insert into personas_cargo(nombre, apellido, dni, direccion, telefono) values(?,?,?,?,?);";
$statement = $cnn->prepare($sql);

$respuesta=false;
//var_dump($personas->{"data"}); //asi accedo al array var_dump es para enviar al cliente y mediante js mostrar en consola
foreach($personas->{"data"} as $persona){
    //echo $persona->{"nombre"};
    //echo $producto->{"precio"};
    
    $statement->bindParam(1, $persona->{"nombre"},PDO::PARAM_STR); //1,2,3 hacen reperencia a los ? puestos en la consulta
    $statement->bindParam(2, $persona->{"apellido"},PDO::PARAM_STR);
    $statement->bindParam(3, $persona->{"dni"},PDO::PARAM_INT);
    $statement->bindParam(4, $persona->{"direccion"},PDO::PARAM_STR);    
    $statement->bindParam(5, $persona->{"telefono"},PDO::PARAM_INT);
    
    $respuesta=$statement->execute();

    }

echo $respuesta;

