<?php
    session_start();
    include 'conexion.php';

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();    
    try {
        $arrOs=array();
        $iCont=0;
        
        $sql = "SELECT * FROM obras_sociales";
        $result=$cnn->query($sql) ;
        foreach ($result as $row) {
        $arrOs[$iCont]=array();
        $arrOs[$iCont]['id_obrasocial']=$row['id_obrasocial'];
        $arrOs[$iCont]['nombre']=$row['nombre'];
        $iCont++;
       }
       $cnn = null;
       echo json_encode($arrOs);
    }
    catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
    }
    
    ?>
            