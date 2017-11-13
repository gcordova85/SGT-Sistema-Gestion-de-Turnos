<?php
    session_start();
    include 'conexion.php';

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();
    $sql = "SELECT * FROM consultorios";
    $statement = $cnn->prepare($sql);
    $valor = $statement->execute();

    if($valor){
        while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
            $data["data"][] = $resultado;
        }
        echo json_encode($data);
    }else{
        echo "error";
    }
    $statement->closeCursor();
    $conexion = null;
        