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
 
 $cert=false;
 $aut=false;

$enviar=true;

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



 if($_FILES["fileCert"]["type"]=="application/pdf"){
  
    move_uploaded_file($_FILES["fileCert"]["tmp_name"],$rutaCert);
    $cert=true;
 }

 if($_FILES["fileAutoriz"]["type"]=="application/pdf"){
    move_uploaded_file($_FILES["fileAutoriz"]["tmp_name"],$rutaAut);
    $aut=true;
 }

  $conexion = new Conexion();
  $cnn = $conexion->getConexion();


  if($cert and $aut){ 
    $sql="UPDATE pacientes SET nombre=:nombre, apellido = :apellido, dni = :dni, direccion = :direccion,
    telefono = :telefono, id_obrasocial=:os, certificado=:fileCert, autorizacion=:fileAut
    WHERE id_paciente = :id;";

    $statement = $cnn->prepare($sql);
    $respuesta=false;
  
    $statement->bindParam(":id",$id, PDO::PARAM_STR);  
    $statement->bindParam(":nombre",$nombre, PDO::PARAM_STR);
    $statement->bindParam(":apellido",$apellido, PDO::PARAM_STR);
    $statement->bindParam(":dni",$dni, PDO::PARAM_INT);
    $statement->bindParam(":direccion",$direccion, PDO::PARAM_STR);
    $statement->bindParam(":telefono",$telefono);
    $statement->bindParam(":os",$os, PDO::PARAM_INT);
    $statement->bindParam(":fileAut",$rutaAut, PDO::PARAM_STR);
    $statement->bindParam(":fileCert",$rutaCert, PDO::PARAM_STR);

}



  if($cert and !$aut){  
    $sql="UPDATE pacientes SET nombre=:nombre, apellido = :apellido, dni = :dni, direccion = :direccion,
    telefono = :telefono, id_obrasocial=:os, certificado=:fileCert
    WHERE id_paciente = :id;";
  
    $statement = $cnn->prepare($sql);
    $respuesta=false;
  
    $statement->bindParam(":id",$id, PDO::PARAM_STR);    
    $statement->bindParam(":nombre",$nombre, PDO::PARAM_STR);
    $statement->bindParam(":apellido",$apellido, PDO::PARAM_STR);
    $statement->bindParam(":dni",$dni, PDO::PARAM_INT);
    $statement->bindParam(":direccion",$direccion, PDO::PARAM_STR);
    $statement->bindParam(":telefono",$telefono);
    $statement->bindParam(":os",$os, PDO::PARAM_INT);
    $statement->bindParam(":fileCert",$rutaCert, PDO::PARAM_STR);

}



  if(!$cert and $aut){
    $sql="UPDATE pacientes SET nombre=:nombre, apellido = :apellido, dni = :dni, direccion = :direccion,
    telefono = :telefono, id_obrasocial=:os, autorizacion=:fileAut
    WHERE id_paciente = :id;";
  
    $statement = $cnn->prepare($sql);
    $respuesta=false;

    $statement->bindParam(":id",$id, PDO::PARAM_STR);    
    $statement->bindParam(":nombre",$nombre, PDO::PARAM_STR);
    $statement->bindParam(":apellido",$apellido, PDO::PARAM_STR);
    $statement->bindParam(":dni",$dni, PDO::PARAM_INT);
    $statement->bindParam(":direccion",$direccion, PDO::PARAM_STR);
    $statement->bindParam(":telefono",$telefono);
    $statement->bindParam(":os",$os, PDO::PARAM_INT);
    $statement->bindParam(":fileAut",$rutaAut, PDO::PARAM_STR);

}
  if(!$cert and !$aut){
    $sql="UPDATE pacientes SET nombre=:nombre, apellido = :apellido, dni = :dni, direccion = :direccion,
    telefono = :telefono, id_obrasocial=:os
    WHERE id_paciente = :id;";
 
    $statement = $cnn->prepare($sql);
    $respuesta=false;

    $statement->bindParam(":id",$id, PDO::PARAM_STR);  
    $statement->bindParam(":nombre",$nombre, PDO::PARAM_STR);
    $statement->bindParam(":apellido",$apellido, PDO::PARAM_STR);
    $statement->bindParam(":dni",$dni, PDO::PARAM_INT);
    $statement->bindParam(":direccion",$direccion, PDO::PARAM_STR);
    $statement->bindParam(":telefono",$telefono);
    $statement->bindParam(":os",$os, PDO::PARAM_INT);
}
  
if($enviar){
  $respuesta=$statement->execute();  
}
  
  echo $respuesta;
   
   $statement->closeCursor();
   $conexion = null;

?>