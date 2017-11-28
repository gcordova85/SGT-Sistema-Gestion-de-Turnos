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

//  if($_FILES["fileCert"]){
//     $cert=true;
//  }

 if($_FILES["fileCert"]["type"]=="application/pdf"){
    // if(file_exists($rutaCert)){
    //     unlink($rutaCert);
    // }
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
  
  $respuesta=$statement->execute();
  
  
  
  echo $respuesta;
   
   $statement->closeCursor();
   $conexion = null;

?>