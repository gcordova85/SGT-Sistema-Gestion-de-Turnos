<?php
 session_start();
 require_once 'conexion.php';

 $conexion = new Conexion();
 $cnn = $conexion->getConexion();
<<<<<<< HEAD
 $sql = "SELECT * FROM pacientes";
=======
 $sql = "SELECT p.id_paciente,p.nombre,p.apellido,p.dni,p.direccion,p.telefono,o.nombre AS 'Obra social',p.certificado,p.autorizacion,p.estado
    FROM pacientes P
    INNER JOIN obras_sociales O ON O.id_obrasocial = P.id_obrasocial 
    WHERE p.estado = 1";
>>>>>>> 891aad21a6aec4376e1addb426c25758b615b153
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
