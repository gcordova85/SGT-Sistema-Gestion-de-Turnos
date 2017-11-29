<?php

session_start();
require_once 'conexion.php';

$id_usuario=$_POST['id_usuario'];
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$tipo_usuario=$_POST['tipo_usuario'];
$estado=$_POST['estado'];

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "UPDATE usuarios SET usuario = :usuario ,clave = :clave,tipo_usuario = :tipo_usuario,estado = :estado WHERE id_usuario= :id_usuario;";
$stmt = $cnn->prepare($sql);

$stmt->bindparam(':id_usuario', $id_usuario);
$stmt->bindparam(':usuario', $usuario);
$stmt->bindparam(':clave', $clave);
$stmt->bindparam(':tipo_usuario', $tipo_usuario);
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