<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Centro terapéutico</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="../lib/DataTables/datatables.min.css"/> 
    <link rel="stylesheet" href="../css/styleMenu.css">
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/styleRegistrarAsistencia.css">


</head>
<body >
    <div class="container">

    <?php  require_once '../inc/header.php'; 
        ?>


        <div class="row" id="fila-encabezado">
            <div class="col-md-12 navbar">
                <h3 class="text-center">Reporte de asistencia del dia</h3>
            </div>
        </div>
        <?php

    if($_SESSION['rol'] == 2){
        
        ?>
        <div clas="table-responsive">
            <table id="tablaReportes" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>Nombre</th>    
                        <th>Apellido</th>
                        <th>Fecha</th>            
                        <th>Profesional</th>
                        <th>Consultorio</th>
                        <th>Hora</th>
                        <th>Dia</th>
                    </tr>
                </thead>
            </table>
         </div>

    </div>


    <?php
        require_once '../inc/footer.php'; 
    ?>
    <script src="../js/jquery-3.2.1.js"></script>   
    <script src="../js/bootstrap.min.js"></script>  
    <script type="text/javascript" src="../lib/DataTables/datatables.min.js"></script>    

    <script src="../js/scriptReporte.js"></script>    
</body>
</html>
<?php
    }
    else {       
        header("Location:mod/menu.php");   
        }
?>


 