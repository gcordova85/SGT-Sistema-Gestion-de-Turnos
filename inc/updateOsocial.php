<?php

session_start();
require_once 'conexion.php';

$id_obrasocial=$_POST['id_obrasocial'];
$email=$_POST['email'];
$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$estado=$_POST['estado'];

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "UPDATE obras_sociales SET nombre=:nombre,email=:email,telefono=:telefono,estado=:estado WHERE id_obrasocial=:id_obrasocial;";
$stmt = $cnn->prepare($sql);

$stmt->bindparam(':id_obrasocial', $id_obrasocial);
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