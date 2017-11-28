<?php
    session_start();
    include 'conexion.php';

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();    
    try {
        $arrOs=array();
        $iCont=0;
        
        $sql = "SELECT c.id_personaCargo, CONCAT(CONCAT(c.nombre,', '),CONCAT(c.apellido,', DNI:'),c.dni) as persona FROM paciente_personacargo pp
        INNER JOIN personas_cargo c on c.id_personaCargo = pp.id_personaCargo
        WHERE c.id_personaCargo NOT IN(
            SELECT c.id_personaCargo FROM paciente_personacargo pp
        INNER JOIN personas_cargo c on c.id_personaCargo = pp.id_personaCargo
        INNER JOIN pacientes pa on pa.id_paciente = pp.id_paciente
        WHERE pp.id_paciente = 4)";
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
            