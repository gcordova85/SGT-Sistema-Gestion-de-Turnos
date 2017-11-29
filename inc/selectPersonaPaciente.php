<?php
session_start();
require_once 'conexion.php';

$id = $_REQUEST["idPaciente"];


$conexion = new Conexion();
$cnn = $conexion->getConexion(); //obtengo conexion
$sql= "SELECT CONCAT(CONCAT(pc.nombre,', '), pc.apellido) as persona,pc.direccion, pc.telefono FROM personas_cargo pc
INNER JOIN paciente_personacargo pp on pc.id_personaCargo = pp.id_personaCargo
INNER JOIN pacientes pa on pa.id_paciente = pp.id_paciente
WHERE pa.id_paciente = $id;";
$statement = $cnn->prepare($sql);
$statement->execute();
$registro = $statement->rowCount();
   if($registro >= 1){
      echo 1; 
     }
   else{    
    echo 0; 
   }

?>  