<?php

session_start();
require_once 'conexion.php';

$id_consultorio=$_POST['id_consultorio'];

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "UPDATE consultorios SET estado = 0 WHERE id_consultorio= :id_consultorio;";
$stmt = $cnn->prepare($sql);

$stmt->bindparam(':id_consultorio', $id_consultorio);

if($stmt->execute())
{
  $respuesta="Datos actualizados correctamente:";
  echo json_encode($respuesta);
}
else {
  $error="No se han actualizados los datos.";
  echo json_encode($error);
}