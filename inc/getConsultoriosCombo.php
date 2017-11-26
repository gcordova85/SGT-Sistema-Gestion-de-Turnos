<?php
    session_start();
    include 'conexion.php';

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();    
    try {
        $arrConsultorios=array();
        $iCont=0;
        
        $sql = "SELECT * FROM consultorios";
        $result=$cnn->query($sql) ;
        foreach ($result as $row) {
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
            