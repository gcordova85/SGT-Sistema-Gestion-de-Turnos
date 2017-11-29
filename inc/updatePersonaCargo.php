<?php

session_start();
require_once 'conexion.php';

$personas = json_decode($_POST["json"]); // recibo json y lo decodifico

$conexion = new Conexion();
$cnn = $conexion->getConexion(); //obtengo conexion
$sql= "UPDATE personas_cargo SET nombre = :nombre, apellido = :apellido, dni = :dni, direccion = :direccion, telefono=:telefono WHERE id_personaCargo = :id;";
$statement = $cnn->prepare($sql);

$respuesta=false;

$enviar=true;

foreach($personas->{"data"} as $persona){
    $pattern='/([A-Za-zñáéíóú]{3,})\s*(([A-Za-zñáéíóú]{3,})){0,1}$/';   
    $success = preg_match($pattern, $persona->{"nombre"});
    if (!$success) {
        echo "Formato de nombre incorrecto";
        
        $enviar=false;
        }
    $success = preg_match($pattern, $persona->{"apellido"});
    if (!$success) {
        echo "Formato de apellido incorrecto";      
        $enviar=false;
    }
    if(!filter_var($persona->{"dni"}, FILTER_VALIDATE_INT) === 0 || filter_var($persona->{"apellido"}, FILTER_VALIDATE_INT) === true)
    {
        echo "Ingresa solo numeros en dni";
        $enviar=false;
    }
    if(strlen($persona->{"direccion"})<5){
        echo "La direccion no es valida";
        $enviar=false;
    }

    if(!filter_var($persona->{"telefono"}, FILTER_VALIDATE_INT) === 0 || filter_var($persona->{"apellido"}, FILTER_VALIDATE_INT) === true)
    {
        echo "Ingresa solo numeros en telefono";
        $enviar=false;
    }
}

    if ($enviar){

        foreach($personas->{"data"} as $persona){     
            
            $statement->bindParam(":id", $persona->{"id_personaCargo"},PDO::PARAM_INT); 
            $statement->bindParam(":nombre", $persona->{"nombre"},PDO::PARAM_STR); 
            $statement->bindParam(":apellido", $persona->{"apellido"},PDO::PARAM_STR);
            $statement->bindParam(":dni", $persona->{"dni"},PDO::PARAM_INT);
            $statement->bindParam(":direccion", $persona->{"direccion"},PDO::PARAM_STR);    
            $statement->bindParam(":telefono", $persona->{"telefono"},PDO::PARAM_INT);
            
            $respuesta=$statement->execute();
        
            }    

        echo $respuesta;        
    }else{
        return "Error";
    }





?>