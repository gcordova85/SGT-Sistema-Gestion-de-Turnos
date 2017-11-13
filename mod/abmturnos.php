<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultorios Francoise Dolto</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">  
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/styleTurnos.css">
    <link rel="stylesheet" type="text/css" href="../lib/DataTables/datatables.min.css">
</head>
<body >
    <div class="container">
        <?php
            require_once '../inc/header.php'; 
        ?>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado de pacientes
                </div>
                <div id="divTablaPacientes">
                    <table id="tablePacienteTurno" class="table table-responsive table-bordered">
                        <thead>
                        <tr class="loginhf">
                            <th>Nro Paciente</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DNI</th>
                            <th></th>
                        </tr>
                        </thead>
                    </table>
                </div>  
            </div>
        </div>
    </div>   
   
             
    </div>
    <?php
        require_once '../inc/footer.php'; 
    ?>
</body>
<script src="../js/jquery-3.2.1.js"></script>   
<script src="../js/bootstrap.min.js"></script> 
<script src="../lib/DataTables/datatables.min.js"></script>
<script src="../js/scriptTurnos.js"></script>
</html>