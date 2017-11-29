<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Centro terapéutico</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
    <script src="../js/jquery-3.2.1.js"></script>   
    <script src="../js/bootstrap.min.js"></script>  
    <script src="../js/scriptRegistrarAsistencia.js"></script>
    <link rel="stylesheet" type="text/css" href="../lib/DataTables/datatables.min.css"/>
    <script type="text/javascript" src="../lib/DataTables/datatables.min.js"></script>     
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
                <h3 class="text-center">Registro de asistencia del paciente</h3>
            </div>
        </div>
        <div class="col-xs-5">
            <a href="menu.php" id="btnVolver" class="btn btn-barra" style="margin: 10px">Volver</a>
        </div>
        <div class="table-responsive">
            <table id="tablaTurnos" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Paciente</th>                 
                        <th>Profesional</th>
                        <th>Consultorio</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
         </div>

    </div>
     <?php
                    
    ?>

    <?php
        require_once '../inc/footer.php'; 
    ?>
</body>
</html>
