<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultorios Francoise Dolto</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
    <script src="../js/jquery-3.2.1.js"></script>   
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/abmConsultorios.js"></script>
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" type="text/css" href="../lib/DataTables/datatables.min.css"/>
    <script type="text/javascript" src="../lib/DataTables/datatables.min.js"></script>
    <link rel="stylesheet" href="../css/font-awesome.min.css">
</head>
<body >
    <div class="container">
        <header>
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="col-xs-4">
                    <h3 "navbar-text">Francoise Dolto</h3>
                </div>
                   <div class="dropdown pull-right">
                       <button class="btn btn-barra navbar-btn dropdown-toggle glyphicon glyphicon-user" type="button" data-toggle="dropdown"> UserName</button>
                       <ul class="dropdown-menu">
                          <li><a href="#">Salir</a></li>
                      </ul>
                   </div> 
                <div class="pull-right">
                    <button class="btn btn-barra navbar-btn "> Reporte de asistencia</button>
                </div>           
             </nav>         
        </header>   
    </div>
    <div class="row">
        <div class="col-md-12 navbar">
            <h3 class="text-center">ABM de Consultorios</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-8 offset-md-1">
            <button type="button" id="botonNuevo" class="btn btn-abm" data-toggle="modal" data-target="#modalABM">Nuevo</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 offset-md-1">
            <div class="table-responsive">
                <table id="tablaConsultorios" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="navbar">N° Consultorio</th>
                            <th class="navbar">Ubicacion</th>
                            <th class="navbar">Estado</th>
                            <th class="navbar">Opciones</th>
                        </tr>
                    </thead>   
                </table>
            </div>
        </div>
    </div>


        <div id="modalABM" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="user_form" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header navbar">
                            <button type="button" class="close" data-dismiss="modal">&times;
                            </button>
                            <h4 class="modal-title text-center">Agregar Consultorio</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="div-nConsultorio" class="form-group col-md-4">
                                        <label for="nConsultorio" class="control-label col-form-label">N° Consultorio:</label>
                                        <input type="number" name="nConsultorio" id="nConsultorio" class="form-control">
                                    </div>
                                    <div id="div-selubicacion" class="form-group col-md-8">
                                        <label for="selUbicacion" class="control-label col-form-label">Ubicacion:</label>
                                        <select name="selUbicacion" id="selUbicacion" placeholder="Seleccione ubicacion" class="form-control">
                                                <option value="Planta Baja">Planta Baja</option>
                                                <option value="1er piso">1er Piso</option>
                                                <option value="2do piso">2do Piso</option>
                                                <option value="3er piso">3er Piso</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                                <input type="button" name="agregarNuevo" id="agregarNuevo" class="btn btn-abm" value="Agregar" />
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    <footer>
            <div class="container text-right">
              <h5>Centro terapéutico Francoise Dolto</h5>
            </div>
    </footer>
</body>
</html>