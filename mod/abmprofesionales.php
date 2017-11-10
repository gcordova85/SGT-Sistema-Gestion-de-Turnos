<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Consultorios Francoise Dolto</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/jquery-3.2.1.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/abmProfesionales.js"></script>
        <link rel="stylesheet" href="../css/styleBase.css">
        <link rel="stylesheet" type="text/css" href="../lib/DataTables/datatables.min.css"/>
        <script type="text/javascript" src="../lib/DataTables/datatables.min.js"></script>
        <link rel="stylesheet" href="../css/font-awesome.min.css">
    </head>
    <body >
        <div class="container">
            <?php
                require_once '../inc/header.php';
            ?>
        </div>
        <div class="row" id="fila-encabezado">
            <div class="col-md-12 navbar">
                <h3 class="text-center">ABM de Profesionales</h3>
            </div>
        </div>
        <div class="row" id="fila-botones">
            <div class="col-md-1"></div>
            <div class="col-md-8 offset-md-1">
                <button type="button" id="botonNuevo" class="btn btn-abm"><a href="personaPaciente.php">Nuevo</a> </button>
            </div>
        </div>
        <div class="row" id="fila-tabla">
            <div class="col-md-1"></div>
            <div class="col-md-10 offset-md-1">
                <div class="table-responsive">
                    <table id="tablaProfesionales" class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th class="navbar">N° Profesional</th>
                                <th class="navbar">Nombre</th>
                                <th class="navbar">Apellido</th>
                                <th class="navbar">Telefono</th>
                                <th class="navbar">Direccion</th>
                                <th class="navbar">E-Mail</th>
                                <th class="navbar">Especialidad</th>
                                <th class="navbar">Opciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <?php
            require_once '../inc/footer.php'; 
        ?>
    </body>
</html>