<?php

session_start();
require_once 'conexion.php';

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$email=$_POST['email'];
$id_especialidad=$_POST['id_especialidad'];
$estado=$_POST['estado'];

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "INSERT INTO profesionales(nombre,apellido,telefono,direccion,email,id_especialidad,estado) values(:nombre,:apellido,:telefono,:direccion,:email,:id_especialidad,:estado)";
$stmt = $cnn->prepare($sql);

$stmt->bindparam(':nombre', $nombre);
$stmt->bindparam(':apellido', $apellido);
$stmt->bindparam(':telefono', $telefono);
$stmt->bindparam(':direccion', $direccion);
$stmt->bindparam(':email', $email);
$stmt->bindparam(':id_especialidad', $id_especialidad);
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