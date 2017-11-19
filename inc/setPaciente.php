<?php
session_start();
 require_once 'conexion.php';
 $personas = json_decode($_POST["json"]); 
  $conexion = new Conexion();
  $cnn = $conexion->getConexion();
  $sql="INSERT INTO paciente (nombre, apellido, dni, direccion, telefono, id_obrasocial, certificado, autorizacion, id_estado) values (?,?,?,?,?,?,?,?,?);";
   
  $statement = $cnn->prepare($sql);
  
  $respuesta=false;
  //var_dump($personas->{"data"}); //asi accedo al array var_dump es para enviar al cliente y mediante js mostrar en consola
  foreach($personas->{"data"} as $persona){
      //echo $persona->{"nombre"};
      echo $persona->{"apellido"};
      echo $persona->{"dni"};
      echo $persona->{"direccion"};
      echo $persona->{"telefono"};
      
      $statement->bindParam(1, $persona->{"nombre"},PDO::PARAM_STR); //1,2,3 hacen reperencia a los ? puestos en la consulta
      $statement->bindParam(2, $persona->{"apellido"},PDO::PARAM_STR);
      $statement->bindParam(3, $persona->{"dni"},PDO::PARAM_INT);
      $statement->bindParam(4, $persona->{"direccion"},PDO::PARAM_STR);    
      $statement->bindParam(5, $persona->{"telefono"},PDO::PARAM_INT);
      $statement->bindParam(6,$persona->{"os"},PDO::PARAM_INT);
      $statement->bindParam(7,$persona->{"discapacidad"},PDO::PARAM_STR);
      $statement->bindParam(8,$persona->{"autorizacion"},PDO::PARAM_STR);
      $statement->bindParam(9,$persona->{"estado"},PDO::PARAM_INT);

      $respuesta=$statement->execute();
  
      }
  
  echo $respuesta;
   
   $statement->closeCursor();
   $conexion = null;

?>