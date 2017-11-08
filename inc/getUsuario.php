<?php
session_start();
 require_once 'conexion.php';

 $clave = trim($_REQUEST['clave']);
  try
  { 
   $sql="SELECT * FROM usuarios WHERE usuario=:usuario";
   $query = $db_con->prepare($sql);
   $query->bindParam(":usuario",$_REQUEST["usuario"]);
   $query->execute();
   $row = $query->fetch(PDO::FETCH_ASSOC); 
   if($row['clave']== $clave){
    
      echo true; // log in
      $_SESSION['usuario'] = $row['usuario'];
   }
   else{
    
    echo false; 
   }
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
?>