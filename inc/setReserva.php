<?php
session_start();
 require_once 'conexion.php';
  $conexion = new Conexion();
  $cnn = $conexion->getConexion();

  $dia = $_REQUEST['idDia'];
  echo "dia-------------------".$dia."     " ;
  $hora = $_REQUEST['idHora'];
  echo "hora ---------------".$hora."      ";
  $diaAnioCalendario = date("z");
  $diaSemana = date("w");
  echo "dia del anio       ".$diaAnioCalendario."         ";
  echo "dia semana         ".$diaSemana."     ";

 


    $conexion = null;