<?php
session_start();
 require_once 'conexion.php';
  $conexion = new Conexion();
  $cnn = $conexion->getConexion();
  $diasTurnos = array();
  $anioActual = date("Y");
  echo "anio actual  ".$anioActual;
  $mes =  date("m"); 
  echo "mes actual  ".$mes;
  $dia = $_REQUEST['idDia'];
  echo "dia-------------------".$dia."     " ;
  $hora = $_REQUEST['idHora'];
  echo "hora ---------------".$hora."      ";
  $diaAnioCalendario = date("z");
  $diaSemana = date("w");
  echo "dia del anio       ".$diaAnioCalendario."         ";
  echo "dia semana         ".$diaSemana."     ";
  if($dia == $diaSemana){
    while($dia<365){
          $diaAnioCalendario=+7;
          array_push($diasTurnos,[$diaAnioCalendario,$hora]);
    };

  };
  echo "dia menos 1     " .$diaSemana;
 echo "semana lista"."  ".$diasTurnos;


    $conexion = null;