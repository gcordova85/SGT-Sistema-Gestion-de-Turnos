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

$fileAut= "autPac".$id.".pdf";
$fileCert= "certPac".$id.".pdf";
 $estado= $_POST["estado"];

 $rutaCert="../data/discapacidad/".$fileCert;
 $rutaAut="../data/autorizacion/".$fileAut;
 
 if($_FILES["fileCert"]["type"]=="application/pdf"){
    move_uploaded_file($_FILES["fileCert"]["tmp_name"],$rutaCert);    
 }else{
     echo "El certificado de discapacidad ser un archivo pdf";
 }

 if($_FILES["fileAutoriz"]["type"]=="application/pdf"){
    move_uploaded_file($_FILES["fileAutoriz"]["tmp_name"],$rutaAut);    
 }else{
    echo "La autorizacion ser un archivo pdf";
}
 


  $conexion = new Conexion();
  $cnn = $conexion->getConexion();
  $sql="INSERT INTO pacientes (nombre, apellido, dni, direccion, telefono, id_obrasocial, certificado, autorizacion, estado) 
  values (:nombre, :apellido, :dni, :direccion, :telefono, :os, :fileCert, :fileAut, :estado);";
  $statement = $cnn->prepare($sql);
  $respuesta=false;
  


  $enviar=false;
  
  $pattern='/([A-Za-zñáéíóú]{3,})\s*(([A-Za-zñáéíóú]{3,})){0,1}$/';   
  $success = preg_match($pattern, $nombre);
  if (!$success) {
      echo "Formato de nombre incorrecto";
      
      $enviar=false;
      }
  $success = preg_match($pattern, $apellido);
  if (!$success) {
      echo "Formato de apellido incorrecto";      
      $enviar=false;
  }
  if(!filter_var($dni, FILTER_VALIDATE_INT) === 0 || filter_var($dni, FILTER_VALIDATE_INT) === true)
  {
      echo "Ingresa solo numeros en dni";
      $enviar=false;
  }
  if(strlen($direccion)<5){
      echo "La direccion no es valida";
      $enviar=false;
  }
  
  if(!filter_var($telefono, FILTER_VALIDATE_INT) === 0 || filter_var($telefono, FILTER_VALIDATE_INT) === true)
  {
      echo "Ingresa solo numeros en telefono";
      $enviar=false;
  }
  
  if ($enviar){
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
  }else {
      echo "error";
  }
  
   
   $statement->closeCursor();
   $conexion = null;

?>