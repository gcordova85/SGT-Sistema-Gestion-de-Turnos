<?php

session_start();
require_once 'conexion.php';

$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$tipo_usuario=$_POST['tipo_usuario'];
$estado=$_POST['estado'];

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "INSERT INTO usuarios (usuario,clave,tipo_usuario,estado) values(:usuario,:clave,:tipo_usuario,:estado)";
$stmt = $cnn->prepare($sql);

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