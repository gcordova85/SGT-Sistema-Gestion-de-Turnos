<?php
session_start();
 require_once 'conexion.php';

  $conexion = new Conexion();
  $cnn = $conexion->getConexion();

   $sql="SELECT * FROM turnos WHERE fecha < :fecha"
   $query = $cnn->prepare($sql);
  $fecha=new DateTime();
   $fecha = substr(current($fecha), 0, -16);
   $query->bindParam(':fecha', $fecha);
   $query->execute();

   $registro = $query->rowCount();

   if($registro >= 1){
      echo 1; 
     }
   else{    
    echo 0; 
   }

    $query->closeCursor();