<?php
    session_start();
    require_once('conexion.php');

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();    
    try {
        $arrConsultorios=array();
        $iCont=0;
        
        $sql = "SELECT c.id_consultorio,c.ubicacion,c.estado,p.apellido AS 'apelido_profesional',p.nombre AS 'nombre_profesional',d.nombre AS 'dia'
			FROM consultorios c
            INNER JOIN pdc ON pdc.id_consultorio = c.id_consultorio
            INNER JOIN profesionales P ON p.id_profesional = pdc.id_profesional
            INNER JOIN dias D ON d.id_dia = pdc.id_dia
            WHERE pdc.id_profesional = :id_profesional";
        $sql = $cnn->prepare($sql);
        $sql->bindParam(':id_profesional', $_REQUEST['idProfesional']);
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
            