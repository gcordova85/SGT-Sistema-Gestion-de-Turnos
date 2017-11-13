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
    <link rel="stylesheet" href="../lib/DataTables/datatables.min.css">
</head>
<body >
    <div class="container">
        <?php
            require_once '../inc/header.php';
        ?>

    <div class="row">
    <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="form-group">
                <label class="control-label" for="idPaciente"> Nro Paciente:</label>
                <input class="form-control" type="text" id="idPaciente" name="idPaciente" value= "<?php $_REQUEST['id']  ?>" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="form-group">
                <label class="control-label" for="nombre"> Nombre:</label>
                <input class="form-control" type="text" id="nombre" name="nombre">
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="form-group">
                <label class="control-label" for="apellido"> Apellido:</label>
                <input class="form-control" type="text" id="apellido" name="apellido">
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="form-group">
                <label class="control-label" for="dni"> DNI</label>
                <input class="form-control" type="number" max="99999999" min="11111111" id="dni" name="dni">
            </div>
        </div>
    </div>    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Seleccione un dia
                </div>
                <div id="divTablaHorarios">
                    <table id="tablaDias" class="table table-bordered">
                        <tr class="loginhf text-center">
                            <th>ID Dia</th>
                            <th>Dia </th>
                        </tr>
                    </table>  
                </div>
            </div>
        </div>   
        <!-- modal de horarios -->
        <div id="modalAsignar" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Seleccionar horario</h4>
                    </div>
                        <table id="tablaHorarios" class="table table-bordered">
                            <tr class="loginhf">
                                <th > Codigo de Horario</th>    
                                <th> Horarios disponibles</th>
                            </tr>
                            
                        </table>
                    <div class="modal-footer">
                        <button type="submit" id="btnAceptar" class="btn btn-buscar" data-dismiss="modal"> 
                            <span class="glyphicon glyphicon-ok"></span> Aceptar
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>        
                </div>
            </div>
    </div>
    <?php
        require_once '../inc/footer.php';
    ?>
    <script src="../js/jquery.js"></script>   
    <script src="../lib/DataTables/datatables.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>     
    <script src="../js/scriptTurnos.js"></script>
</body>
</html>