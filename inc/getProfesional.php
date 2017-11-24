<?php
    session_start();
    include 'conexion.php';

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();    
    try {
        $arrProfesionales=array();
        $iCont=0;
        
        $sql = "SELECT * FROM profesionales";
        $result=$cnn->query($sql) ;
        foreach ($result as $row) {
        $arrProfesionales[$iCont]=array();
        $arrProfesionales[$iCont]['id_profesional']=$row['id_profesional'];
        $arrProfesionales[$iCont]['nombre']=$row['nombre'];
        $arrProfesionales[$iCont]['apellido']=$row['apellido'];
        $iCont++;
       }
       $cnn = null;
       echo json_encode($arrProfesionales);
    }
    catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
    }
    
    ?>
            