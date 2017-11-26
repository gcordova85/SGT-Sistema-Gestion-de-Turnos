<?php
    session_start();
    include 'conexion.php';

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();    
    try {
        $arrEspecialidades=array();
        $iCont=0;
        
        $sql = "SELECT id_especialidad,descripcion FROM especialidades";
        $result=$cnn->query($sql) ;
        foreach ($result as $row) {
        $arrEspecialidades[$iCont]=array();
        $arrEspecialidades[$iCont]['id_especialidad']=$row['id_especialidad'];
        $arrEspecialidades[$iCont]['descripcion']=$row['descripcion'];
        $iCont++;
       }
       $cnn = null;
       echo json_encode($arrEspecialidades);
    }
    catch (PDOexception $e) {
       echo "Error is: " . $e-> etmessage();
    }
    
    ?>