<?php
session_start();
 require_once 'conexion.php';

  $conexion = new Conexion();
  $cnn = $conexion->getConexion();

   $sql="SELECT * FROM turnos";
   $query = $cnn->prepare($sql);
   $query->execute();
   $registro = $query->rowCount();
   if($registro >= 1){
      echo 1; 
     }
   else{    
    echo 0; 
   }

    $query->closeCursor();