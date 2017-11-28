<?php

session_start();
require_once 'conexion.php';

$id_consultorio=$_POST['id_consultorio'];
$ubicacion=$_POST['ubicacion'];
$estado=$_POST['estado'];

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "UPDATE consultorios SET ubicacion=:ubicacion,estado=:estado WHERE id_consultorio=:id_consultorio;";
$stmt = $cnn->prepare($sql);

$stmt->bindparam(':id_consultorio', $id_consultorio);
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