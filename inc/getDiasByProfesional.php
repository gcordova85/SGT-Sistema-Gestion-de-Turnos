<?php
    session_start();
    require_once('conexion.php');

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();    
    try {
        $arrConsultorios=array();
        $iCont=0;
        
        $sql = "SELECT d.id_dia,d.nombre,c.id_consultorio,c.ubicacion,p.id_profesional
			FROM dias D
            INNER JOIN pdc ON pdc.id_dia = d.id_dia
            INNER JOIN profesionales P ON p.id_profesional = pdc.id_profesional
            INNER JOIN consultorios C ON c.id_consultorio = pdc.id_consultorio
            WHERE pdc.id_profesional = :id_profesional and pdc.id_consultorio = :id_consultorio";
        $sql = $cnn->prepare($sql);
        $sql->bindParam(':id_profesional', $_REQUEST['idProfesional']);
        $sql->bindParam(':id_consultorio', $_REQUEST['idConsultorio']);
        $sql->execute();

        foreach ($sql->fetchAll() as $row) {
        $arrConsultorios[$iCont]=array();
        $arrConsultorios[$iCont]['id_dia']=$row['id_dia'];
        $arrConsultorios[$iCont]['nombre']=$row['nombre'];
        $iCont++;
       }
       $cnn = null;
       echo json_encode($arrConsultorios);
    }
    catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
    }
    
    ?>
            