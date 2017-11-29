<?php

session_start();
require_once 'conexion.php';

$id_usuario=$_POST['id_usuario'];

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "UPDATE usuarios SET estado = 0 WHERE id_usuario= :id_usuario;";
$stmt = $cnn->prepare($sql);

$stmt->bindparam(':id_usuario', $id_usuario);

if($stmt->execute())
{
  $respuesta="Datos actualizados correctamente:";
  echo json_encode($respuesta);
}
else {
  $error="No se han actualizados los datos.";
  echo json_encode($error);
}