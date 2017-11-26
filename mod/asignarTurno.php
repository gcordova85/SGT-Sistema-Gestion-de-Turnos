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
<body onload="noVolver();">
    <div class="container">
        <?php
            require_once '../inc/header.php';
        ?>

    <div class="row">
    <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="form-group">
                <label class="control-label" for="idPaciente"> Nro Paciente:</label>
                <input class="form-control" type="text" id="idPaciente" name="idPaciente" value= "<?php echo $_REQUEST['id'];?>" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="form-group">
                <label class="control-label" for="nombre"> Nombre:</label>
                <input class="form-control" type="text" id="nombre" name="nombre" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="form-group">
                <label class="control-label" for="apellido"> Apellido:</label>
                <input class="form-control" type="text" id="apellido" name="apellido" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="form-group">
                <label class="control-label" for="dni"> DNI</label>
                <input class="form-control" type="number" max="99999999" min="11111111" id="dni" name="dni" disabled>
            </div>
        </div>
    </div>   
    <div>
        <label for="espec"></label>
    </div> 
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <label for="profesionales" class="control-label">Elegir Profesional:</label>           
                <select name="profesionales" id="profesionales" class="form-control" required>
                    <option value="0">Selecciones una opcion</option>
                </select>

            </div>
        </div>   
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <label for="consultorio" class="control-label">Consultorios</label>           
                <input class="form-control" type="text"  id="consultorio" name="consultorio" disabled>

            </div>
        </div> 
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <label for="dias" class="control-label">Elegir dia</label>           
                <select name="dias" id="dias" class="form-control" required>
                    <option value="0">Selecciones una opcion</option>
                </select>

            </div>
        </div>     


    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Seleccione un horario
                </div>
                <div class="table-responsive">
                    <table id="tablaHorarios" class="table table-bordered dt-responsive">
                    <thead>
                            <tr class="loginhf">
                            <th > Codigo de Horario</th>    
                            <th> Horarios disponibles</th>
                            <th></th>
                            </tr>
                    </thead>
                </table>
                </div>
            </div>
        </div> 
        <div class="col-xs-12 col-sm-offset-10 col-md-offset-8 col-md-4">
            <button class="btn btn-danger">Cancelar</button>
        </div>
        
        <!-- modal de horarios -->
        <!-- <div id="modalAsignar" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Seleccionar horario</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                          <table id="tablaHorarios" class="table table-bordered dt-responsive">
                            <thead>
                                 <tr class="loginhf">
                                   <th > Codigo de Horario</th>    
                                   <th> Horarios disponibles</th>
                                   <th></th>
                                 </tr>
                            </thead>
                        </table>
                        </div>
                    </div>
                </div>        
                </div>
            </div> -->
    </div>
    <?php
        require_once '../inc/footer.php';
    ?>
    <script src="../js/jquery.js"></script>   
    <script src="../lib/DataTables/datatables.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>     
    <script src="../js/scriptAsignarTurnos.js"></script>
</body>
</html>