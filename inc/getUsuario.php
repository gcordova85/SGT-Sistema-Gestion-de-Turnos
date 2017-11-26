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
   $registro = $query->rowCount();
   if($registro == 1){
    if($row['clave']== $clave){      
        echo 1;
        $_SESSION['usuario'] = $row['usuario'];
        $_SESSION['rol'] = $row['tipo_usuario'];
      }
     else{    
      echo 0; 
     }
   }
   else{    
    echo 0; 
   }

    $query->closeCursor();
    $conexion = null;