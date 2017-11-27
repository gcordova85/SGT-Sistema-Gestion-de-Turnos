<?php
    session_start();
    require_once('conexion.php');

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();  
      
    try {
        $arrConsultorios=array();
        $iCont=0;
        
        $sql = "SELECT c.id_consultorio, c.ubicacion FROM consultorios as c 
                WHERE c.id_consultorio NOT IN
                (
                    SELECT c.id_consultorio FROM consultorios as c
                    INNER JOIN pdc p on p.id_consultorio = c.id_consultorio
                    INNER JOIN dias d on d.id_dia = p.id_dia
                    WHERE d.id_dia = :id_dia
                )";
        $sql = $cnn->prepare($sql);
        $sql->bindParam(':id_dia', $_REQUEST['idDia']);
        $sql->execute();

        foreach ($sql->fetchAll() as $row) {
        $arrConsultorios[$iCont]=array();
        $arrConsultorios[$iCont]['id_consultorio']=$row['id_consultorio'];
        $arrConsultorios[$iCont]['ubicacion']=$row['ubicacion'];
        $iCont++;
       }
       $cnn = null;
       echo json_encode($arrConsultorios);
    }
    catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
    }
    
    ?>
            