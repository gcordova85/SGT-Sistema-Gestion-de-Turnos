<?php
    session_start();
    require_once('conexion.php');

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();    

        $sql = "SELECT id_pdc
                FROM pdc 
                WHERE id_profesional = :id_profesional 
                and id_consultorio = :id_consultorio 
                and id_dia = :id_dia 
                and estado = 1";

        $sql = $cnn->prepare($sql);
        $sql->bindParam(':id_profesional', $_REQUEST['idProfesional']);
        $sql->bindParam(':id_consultorio', $_REQUEST['idConsultorio']);
        $sql->bindParam(':id_dia', $_REQUEST['idDia']);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $registro = $sql->rowCount();
        if($registro > 0){
            $idPDC = $row['id_pdc']; 
            echo trim($idPDC);
        }
        else{
            echo "error";
        }
        

       $cnn = null;
      


    
    ?>
            