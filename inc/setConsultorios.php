<?php

session_start();
require_once 'conexion.php';

$ubicacion=$_POST['ubicacion'];
$estado=$_POST['estado'];

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "INSERT INTO consultorios(ubicacion,estado) values(:ubicacion,:estado)";
$stmt = $cnn->prepare($sql);

$stmt->bindparam(':ubicacion', $ubicacion);
$stmt->bindparam(':estado', $estado);
if($stmt->execute())
{
  $respuesta="Datos insertados correctamente:";
  echo json_encode($respuesta);
}
else {
  $error="No se han insertado los datos.";
  echo json_encode($error);
}

