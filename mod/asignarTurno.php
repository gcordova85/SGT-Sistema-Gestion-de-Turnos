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
<body>
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
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="especialidades" class="control-label">Elegir especialidad:</label>           
                <select name="especialidades" id="especialidades" class="form-control" required>
                    
                </select>

            </div>
        </div>   
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="profesionales" class="control-label">Elegir Profesional:</label>           
                <select name="profesionales" id="profesionales" class="form-control" required>
                    
                </select>

            </div>
        </div>   
        <div class="col-xs-12 col-sm-4 col-md-offset-1 col-md-5">
            <div class="form-group">
                <span class="input-group-addon"> <strong>Nro. consultorio </strong></span>          
                <input class="form-control text-center" type="text"  id="idConsultorio" name="idConsultorio" disabled>

            </div>
        </div> 
        <div class="col-xs-12 col-sm-4 col-md-5">
            <div class="form-group">
                <span class="input-group-addon"><strong>Ubicacion</strong></span>          
                <input class="form-control text-center" type="text"  id="ubicacionConsultorio" name="ubicacionConsultorio" disabled>

            </div>
        </div> 
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <label for="dias" class="control-label">Elegir dia</label>           
                <select name="dias" id="dias" class="form-control" required>
                    
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
           
                    <table id="tablaHorarios" class="table table-bordered dt-responsive table-responsive">
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
        <div class="col-xs-offset-9 col-sm-offset-10 col-md-offset-11">
           <a href="abmTurnos.php"> <button class="btn btn-danger">Cancelar</button></a>
        </div>
<!-- Modal -->
<div id="aceptarTurnos" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Turnos</h4>
      </div>
      <div class="modal-body">
      <div class="table-responsive">
      <table id="tablaAceptarTurnos" class="table table-bordered table-responsive">
      <thead>
            <tr class="loginhf">
              <th>Fecha</th>    
              <th>Dia </th>
              <th>Hora</th>
            </tr>
      </thead>
  </table>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="aceptarTurnos" name="aceptarTurnos">Aceptar</button>
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
    <script src="../js/scriptAsignarTurnos.js"></script>
</body>
</html>