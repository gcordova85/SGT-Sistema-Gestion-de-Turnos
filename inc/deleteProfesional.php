<?php

session_start();
require_once 'conexion.php';

$id_profesional=$_POST['id_profesional'];

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "UPDATE profesionales SET estado = 0 WHERE id_profesional= :id_profesional;";
$stmt = $cnn->prepare($sql);

$stmt->bindparam(':id_profesional', $id_profesional);

if($stmt->execute())
{
  $respuesta="Datos actualizados correctamente:";
  echo json_encode($respuesta);
}
else {
  $error="No se han actualizados los datos.";
  echo json_encode($error);
}