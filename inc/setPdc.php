<?php

session_start();
require_once 'conexion.php';

$profesional=$_POST['idProfesional'];
$dia=$_POST['idDia'];
$consultorio=$_POST['idConsultorio'];
$estado=$_POST['estado'];

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "INSERT INTO pdc(id_profesional,id_dia,id_consultorio, estado) values($profesional,$dia,$consultorio, $estado)";
$stmt = $cnn->prepare($sql);

if($stmt->execute())
{
  $respuesta="Datos insertados correctamente:";
  echo json_encode($respuesta);
}
else {
  $error="No se han insertado los datos.";
  echo json_encode($error);
}