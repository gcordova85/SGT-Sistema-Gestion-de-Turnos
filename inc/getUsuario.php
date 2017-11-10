<?php
session_start();
 require_once 'conexion.php';

  $conexion = new Conexion();
  $cnn = $conexion->getConexion();
  $clave = trim($_REQUEST['clave']);

   $sql="SELECT * FROM usuarios WHERE usuario=:usuario";
   $query = $cnn->prepare($sql);
   $query->bindParam(":usuario",$_REQUEST["usuario"]);
   $query->execute();
   $row = $query->fetch(PDO::FETCH_ASSOC); 
   if($row['clave']== $clave){
    
      echo trim(1); // log in
      $_SESSION['usuario'] = $row['usuario'];
   }
   else{    
    echo 0; 
   }
    $query->closeCursor();
    $conexion = null;