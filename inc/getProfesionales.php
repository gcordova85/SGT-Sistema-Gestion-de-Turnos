<?php
    session_start();
    require_once 'conexion.php';

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();
    $sql = "SELECT p.id_profesional,p.nombre,p.apellido,p.telefono,p.direccion,p.email,p.id_especialidad, e.descripcion AS especialidad FROM profesionales p
    INNER JOIN especialidades e ON e.id_especialidad = p.id_especialidad
    WHERE estado = 1";
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
        