<?php

session_start();
require_once 'conexion.php';

$id_obrasocial=$_POST['id_obrasocial'];

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "UPDATE obras_sociales SET estado = 0 WHERE id_obrasocial= :id_obrasocial;";
$stmt = $cnn->prepare($sql);

$stmt->bindparam(':id_obrasocial', $id_obrasocial);

if($stmt->execute())
{
  $respuesta="Datos actualizados correctamente:";
  echo json_encode($respuesta);
}
else {
  $error="No se han actualizados los datos.";
  echo json_encode($error);
}