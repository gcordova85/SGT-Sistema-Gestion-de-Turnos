<?php
 session_start();
 require_once 'conexion.php';

  $sql = "SELECT * FROM paciente";
  $query = $db_con->prepare($sql);
  $valor = $query->execute();
 
  if($valor){
      while($resultado = $query->fetch(PDO::FETCH_ASSOC)){
          $data["data"][] = $resultado;
      }
      echo json_encode($data);
  }
    else{
        echo "error";
    }


?>
