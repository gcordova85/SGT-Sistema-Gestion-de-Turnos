<?php
    session_start();
    require_once('conexion.php');

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();    
    try {
        $arrPDC=array();
        $iCont=0;
        
        $sql = "SELECT pdc.id_pdc
			FROM pdc 
            INNER JOIN profesionales ON p.id_profesional = pdc.id_profesional
            INNER JOIN consultorios c ON c.id_consultorio = pdc.id_consultorio
            INNER JOIN dias D ON d.id_dia = pdc.id_dia
            WHERE pdc.id_profesional = :id_profesional
            pdc.id_consultorio = :id_consultorio
            pdc.id_dia = :id_dia";
        $sql = $cnn->prepare($sql);
        $sql->bindParam(':id_profesional', $_REQUEST['idProfesional']);
        $sql->bindParam(':id_consultorio', $_REQUEST['idDia']);
        $sql->bindParam(':id_dia', $_REQUEST['idConsultorio']);
        $sql->execute();

        foreach ($sql->fetchAll() as $row) {
        $arrPDC[$iCont]=array();
        $arrPDC[$iCont]['id_pdc']=$row['id_pdc'];
        $iCont++;
       }
       $cnn = null;
       echo json_encode($arrPDC);
    }
    catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
    }
    
    ?>
            