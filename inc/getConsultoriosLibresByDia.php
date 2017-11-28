<?php
    session_start();
    require_once('conexion.php');

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();  
      
    try {
        $arrConsultorios=array();
        $iCont=0;


        $consultaExiste = "SELECT DISTINCT p.id_profesional
        FROM pdc p
        INNER JOIN profesionales pr ON pr.id_profesional = p.id_profesional
        WHERE p.id_profesional = :id_profesional";
        $consultaExiste = $cnn->prepare($consultaExiste);
        $consultaExiste->bindParam(':id_profesional', $_REQUEST['idProfesional']);        
        $valor = $consultaExiste->execute();
        $contar = $consultaExiste->rowCount();

        if($contar <> 0){
            $sql="SELECT DISTINCT c.id_consultorio, c.ubicacion FROM consultorios as c
            INNER JOIN pdc p on p.id_consultorio = c.id_consultorio
            INNER JOIN profesionales pr on pr.id_profesional = p.id_profesional
            WHERE pr.id_profesional = :id_profesional";
            $sql = $cnn->prepare($sql);                            
            $sql->bindParam(':id_profesional', $_REQUEST['idProfesional']);
                             
     }
    
     else{
        $sql = "SELECT DISTINCT c.id_consultorio, c.ubicacion FROM consultorios as c 
                WHERE c.id_consultorio NOT IN
                (
                    SELECT c.id_consultorio FROM consultorios as c
                    INNER JOIN pdc p on p.id_consultorio = c.id_consultorio
                    INNER JOIN dias d on d.id_dia = p.id_dia
                    WHERE d.id_dia = :id_dia
                )";
                 $sql = $cnn->prepare($sql);
                 $sql->bindParam(':id_dia', $_REQUEST['idDia']);
                
            }
       
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
            