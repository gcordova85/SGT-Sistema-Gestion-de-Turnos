<?php
    session_start();
    include 'conexion.php';

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();    
    try {
        $arrDias=array();
        $iCont=0;
        
        $sql = "SELECT dias.nombre, dias.id_dia
                FROM dias 
                WHERE dias.id_dia 
                NOT IN
                ( 
                    SELECT distinct dias.id_dia FROM dias
                    INNER JOIN pdc p on p.id_dia = dias.id_dia
                    INNER JOIN profesionales pr on pr.id_profesional = p.id_profesional
                    WHERE p.id_profesional= :id_profesional
                )";
        $sql = $cnn->prepare($sql);
        $sql->bindParam(':id_profesional', $_REQUEST['idProfesional']);
        $sql->execute();
        foreach ($sql->fetchAll() as $row) {
        $arrDias[$iCont]=array();
        $arrDias[$iCont]['id_dia']=$row['id_dia'];
        $arrDias[$iCont]['nombre']=$row['nombre'];
        $iCont++;
       }
       $cnn = null;
       echo json_encode($arrDias);
    }
    catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
    }
    
    ?>
            