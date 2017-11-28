
<?php
    session_start();
    require_once 'conexion.php';

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();
    $sql = "SELECT CONCAT(CONCAT(pr.nombre,', '), pr.apellido) AS profesional,
     d.nombre nombre_dia, c.id_consultorio id_consultorio, c.ubicacion ubicacion_consultorio 
    FROM pdc p
    INNER JOIN profesionales pr on pr.id_profesional = p.id_profesional
    INNER JOIN consultorios c on c.id_consultorio = p.id_consultorio
    INNER JOIN dias d on d.id_dia = p.id_dia";
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
