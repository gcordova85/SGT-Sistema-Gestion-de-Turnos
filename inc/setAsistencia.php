<?php

session_start();
require_once 'conexion.php';

$id_turno=$_REQUEST['idTurno'];
$estado='2';

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "UPDATE turnos SET estado=:estado WHERE id_turno=:id_turno;";
$stmt = $cnn->prepare($sql);

$stmt->bindparam(':id_turno', $id_turno);
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