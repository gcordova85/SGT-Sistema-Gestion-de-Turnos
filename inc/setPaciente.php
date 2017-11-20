<?php
session_start();
 require_once 'conexion.php';
 $id= $_POST["id"];
 $nombre = $_POST["nom"];
 $apellido= $_POST["ape"];
 $dni= $_POST["dni"];
 $direccion= $_POST["dir"];
 $telefono= $_POST["tel"];
 $os= $_POST["os"];
//  $fileAut= $_FILES["fileAutoriz"]["name"];
//  $fileCert= $_FILES["fileCert"]["name"];
$fileAut= "autorizacionPaciente".$nombre.$dni.".jpg";
$fileCert= "certificadoPaciente".$nombre.$dni.".jpg";
 $estado= $_POST["estado"];

 $rutaCert="../data/discapacidad/".$fileCert;
 $rutaAut="../data/autorizacion/".$fileAut;
 
 move_uploaded_file($_FILES["fileCert"]["tmp_name"],$rutaCert);
 move_uploaded_file($_FILES["fileAutoriz"]["tmp_name"],$rutaAut);
 


  $conexion = new Conexion();
  $cnn = $conexion->getConexion();
  $sql="INSERT INTO paciente (nombre, apellido, dni, direccion, telefono, id_obrasocial, certificado, autorizacion, id_estado) 
  values (:nombre, :apellido, :dni, :direccion, :telefono, :os, :fileAut, :fileCert, :estado);";
  $statement = $cnn->prepare($sql);
  $respuesta=false;
  
  $statement->bindParam(":nombre",$nombre, PDO::PARAM_STR);
  $statement->bindParam(":apellido",$apellido, PDO::PARAM_STR);
  $statement->bindParam(":dni",$dni, PDO::PARAM_INT);
  $statement->bindParam(":direccion",$direccion, PDO::PARAM_STR);
  $statement->bindParam(":telefono",$telefono);
  $statement->bindParam(":os",$os, PDO::PARAM_INT);
  $statement->bindParam(":fileAut",$rutaAut, PDO::PARAM_STR);
  $statement->bindParam(":fileCert",$rutaCert, PDO::PARAM_STR);
  $statement->bindParam(":estado",$estado, PDO::PARAM_INT);
  

  $respuesta=$statement->execute();
  
  
  
  echo $respuesta;
   
   $statement->closeCursor();
   $conexion = null;

?>