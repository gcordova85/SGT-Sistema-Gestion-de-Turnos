<?php

session_start();
require_once 'conexion.php';

$profesionales = json_decode($_POST["json"]);

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql= "INSERT INTO profesionales(id_profesional,nombres,apellido,telefono,direccion,email,id_especialidad) values(?,?,?,?,?,?,?);";
$statement = $cnn->prepare($sql);

$respuesta=false;
var_dump($profesionales->{"data"});
foreach($profesionales->{"data"} as $profesional){
    echo $profesional->{"id_profesional"};
    echo $profesional->{"nombres"};
    echo $profesional->{"apellido"};
    echo $profesional->{"telefono"};
    echo $profesional->{"direccion"};
    echo $profesional->{"email"};
    echo $profesional->{"id_especialidad"};
    
    $statement->bindParam(1, $profesional->{"id_profesional"},PDO::PARAM_INT);
    $statement->bindParam(2, $profesional->{"nombres"},PDO::PARAM_STR);
    $statement->bindParam(3, $profesional->{"apellido"},PDO::PARAM_STR);
    $statement->bindParam(4, $profesional->{"telefono"},PDO::PARAM_INT);
    $statement->bindParam(5, $profesional->{"direccion"},PDO::PARAM_STR);
    $statement->bindParam(6, $profesional->{"email"},PDO::PARAM_STR);
    $statement->bindParam(7, $profesional->{"id_especialidad"},PDO::PARAM_INT);

    $respuesta=$statement->execute();

    }

echo $respuesta;

