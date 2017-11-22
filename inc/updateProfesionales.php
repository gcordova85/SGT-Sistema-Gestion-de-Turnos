<?php

session_start();
require_once 'conexion.php';

$id_profesional=$_POST['id_profesional'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$email=$_POST['email'];
$id_especialidad=$_POST['id_especialidad'];
$estado=$_POST['estado'];

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "UPDATE profesionales SET nombre = :nombre ,apellido = :apellido,telefono = :telefono,direccion = :direccion,email = :email,id_especialidad = :id_especialidad,estado = :estado WHERE id_profesional= :id_profesional;";
$stmt = $cnn->prepare($sql);

$stmt->bindparam(':id_profesional', $id_profesional);
$stmt->bindparam(':nombre', $nombre);
$stmt->bindparam(':apellido', $apellido);
$stmt->bindparam(':telefono', $telefono);
$stmt->bindparam(':direccion', $direccion);
$stmt->bindparam(':email', $email);
$stmt->bindparam(':id_especialidad', $id_especialidad);
$stmt->bindparam(':estado', $estado);
if($stmt->execute())
{
  $respuesta="Datos actualizados correctamente:";
  echo json_encode($respuesta);
}
else {
  $error="No se han actualizados los datos.";
  echo json_encode($error);
}