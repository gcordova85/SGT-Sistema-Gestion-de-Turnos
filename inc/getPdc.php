
<?php
    session_start();
    require_once 'conexion.php';

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();
    $sql = "SELECT * FROM pdc";
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

?>
