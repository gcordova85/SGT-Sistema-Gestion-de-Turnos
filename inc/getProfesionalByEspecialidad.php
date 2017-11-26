<?php
    session_start();
    include 'conexion.php';

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();    
    try {
        $arrProfesionales=array();
        $iCont=0;
        
        $sql = "SELECT p.id_profesional,p.nombre, p.apellido,p.id_especialidad,e.descripcion as 'especialidad'
        FROM profesionales P
        INNER JOIN especialidades E ON e.id_especialidad = p.id_especialidad
        WHERE p.id_especialidad = :id_especialidad";
        $sql = $cnn->prepare($sql);
        $sql->bindParam(':id_especialidad', $_REQUEST['idEspecialidad']);
        $sql->execute();
        foreach ($sql->fetchAll() as $row) {
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
            