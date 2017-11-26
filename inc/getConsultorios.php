<?php
    session_start();
    include 'conexion.php';

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();    
    try {
        $arrConsultorios=array();
        $iCont=0;
        
        $sql = "SELECT * FROM consultorios 
            INNER JOIN pdc ON pdc.id_consultorio = consultorios.id_consultorio
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
            