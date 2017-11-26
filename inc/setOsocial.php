<?php

session_start();
require_once 'conexion.php';

$nombre=$_POST['nombre'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$estado=$_POST['estado'];

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "INSERT INTO obras_sociales(nombre,email,telefono,estado) values(:nombre,:email,:telefono,:estado)";
$stmt = $cnn->prepare($sql);

$stmt->bindparam(':nombre', $nombre);
$stmt->bindparam(':email', $email);
$stmt->bindparam(':telefono', $telefono);
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