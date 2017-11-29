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
 

    <?php  require_once '../inc/header.php'; 
        ?>
    <div class="container">


        <div class="row" id="fila-encabezado">
            <div class="col-md-12 navbar">
                <h3 class="text-center">Reporte de asistencia</h3>
            </div>
        </div>
        
        <div class="">
            <a href="menu.php" id="btnVolver" class="btn btn-barra" style="margin: 10px">Volver</a>
        </div>
<?php
    if($_SESSION['rol'] == 2){
        
        ?>
        <div class="table-responsive">
            <table id="tablaReportes" class="table table-striped dt-responsive table-bordered nowrap">
                <thead>
                    <tr>
                        <th>Paciente</th>    
                        <th>Fecha</th>            
                        <th>Profesional</th>
                        <th>Consultorio</th>
                        <th>Hora</th>
                        <th>Estado</th>
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


 