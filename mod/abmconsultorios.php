<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultorios Francoise Dolto</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> 
    <script src="../js/jquery-3.2.1.js"></script>   
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/abmConsultorios.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/styleBase.css">
    <link rel="stylesheet" type="text/css" href="../lib/DataTables/datatables.min.css"/>
    <script type="text/javascript" src="../lib/DataTables/datatables.min.js"></script>
    <link rel="stylesheet" href="../css/font-awesome.min.css">
</head>
<body >
    <div class="container" id="div-header">
        <?php
        require_once '../inc/header.php'; 
        ?>
    </div>
    <div class="row" id="div-titulo-abm">
        <div class="col-md-12 navbar">
            <h3 class="text-center">ABM de Consultorios</h3>
        </div>
    </div>
    <div class="row" id="div-barra-botones">
        <div class="container">
            <button type="button" id="botonNuevo" class="btn btn-abm" data-toggle="modal" data-target="#modalABM" style="margin: 10px">Nuevo</button>
        </div>
    </div>
    <div class="row" id="div-datatable">
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
            <form method="POST" id="nuevo-consultorio">
                <div class="modal-content">
                    <div class="modal-header navbar">
                        <button type="button" class="close" data-dismiss="modal">&times;
                        </button>
                        <h4 class="modal-title text-center">Agregar Consultorio</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row"><input type="hidden"</div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <label for="selUbicacion" class="control-label col-form-label">Ubicacion:</label>
                                <select name="selUbicacion" id="selUbicacion" placeholder="Seleccione ubicacion" class="form-control">
                                        <option value="Planta baja">Planta baja</option>
                                        <option value="1er piso">1er piso</option>
                                        <option value="2do piso">2do piso</option>
                                        <option value="3er piso">3er piso</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                            <input type="submit" name="agregarNuevo" id="agregarNuevo" class="btn btn-abm" value="Agregar" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <?php
    require_once '../inc/footer.php'; 
    ?>
</body>
</html>