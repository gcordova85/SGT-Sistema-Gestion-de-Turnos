<?php
 session_start();
 require_once 'conexion.php';

 $conexion = new Conexion();
 $cnn = $conexion->getConexion();
 $sql = "SELECT p.id_paciente,CONCAT(CONCAT(p.nombre,', '),p.apellido)AS paciente,p.dni,p.direccion,p.telefono,o.nombre AS 'Obra_social',p.certificado,p.autorizacion,p.estado
    FROM pacientes P
    INNER JOIN obras_sociales O ON O.id_obrasocial = P.id_obrasocial";
 $statement = $cnn->prepare($sql);
 $valor = $statement->execute();
 $contar = $statement->rowCount(); 
 if($contar <> 0){
    while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
        $data["data"][] = $resultado;
        
 }echo json_encode($data);
}
 else{
        echo "error";
    }
    
 
 $statement->closeCursor();
 $conexion = null;
