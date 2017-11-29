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
        <script src="../js/abmUsuarios.js"></script>
        <link rel="stylesheet" href="../css/styleBase.css">
        <link rel="stylesheet" href="../css/styleABM.css">
        <link rel="stylesheet" type="text/css" href="../lib/DataTables/datatables.min.css"/>
        <script type="text/javascript" src="../lib/DataTables/datatables.min.js"></script>
        <link rel="stylesheet" href="../css/font-awesome.min.css">
    </head>
    <body >
        <div class="container">
            <?php
                require_once '../inc/header.php';
            ?>
            <div class="row" id="fila-encabezado">
                <div class="col-md-12 navbar">
                    <h3 class="text-center">ABM de Usuarios</h3>
                </div>
            </div>
            <div class="row" id="fila-botones">
                <div class="col-md-1"></div>
                <div class="col-xs-5">
                    <a href="menu.php" id="btnVolver" class="btn btn-barra" style="margin: 10px">Volver</a>
                </div>
                <div class="col-xs-5 text-right">
                    <button type="button" id="botonNuevo" class="btn btn-barra" data-toggle="modal" data-target="#modalUsuarios" style="margin: 10px">Nuevo</button>
                </div>
                <div class="col-md-1 hidden-xs"></div>
            </div>
            <div class="row" id="fila-tabla">
                <div class="col-md-1"></div>
                <div class="col-md-10 offset-md-1">
                    <div class="table-responsive">
                        <table id="tablaUsuarios" class="table table-bordered table-condensed" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="navbar">N° Usuario</th>
                                    <th class="navbar">Nombre</th>
                                    <th class="navbar">Password</th>
                                    <th class="navbar">Tipo de Usuario</th>
                                    <th class="navbar" style="width: 10%">Opciones</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div id="modalUsuarios" class="modal fade">
                <div class="modal-dialog container">
                    <form method="POST" id="nuevoUsuario">
                        <div class="modal-content">
                            <div class="modal-header navbar">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-center" id="titulo-modal">Agregar Usuario</h4>
                            </div>
                            <div class="modal-body">
                            <div id="div-formulario">
                                <div class="row oculto">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div id="div-nUsuario" class="form-group">
                                            <label for="nUsuario" class="control-label col-form-label">N° Usuario:</label>
                                            <input type="number" name="nUsuario" id="nUsuario" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="col-md-6">
                                            <div id="div-nombreUsuario" class="divInput form-group">
                                                <label for="nombreUsuario" class="control-label col-form-label">Nombre de usuario:</label>
                                                <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control" required>
                                                <div class="alert alert-danger divError oculto" id="errorNom">
                                                    <p><b>Ingrese un nombre de usuario correcto (caracteres alfanumericos)</b></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="div-passUsuario" class="divInput form-group">
                                                <label for="passUsuario" class="control-label col-form-label">Password:</label>
                                                <input type="password" name="passUsuario" id="passUsuario" class="form-control" required>
                                                <div class="alert alert-danger divError oculto" id="errorPass">
                                                    <p><b>Ingrese una contraseña valida</b></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="col-md-12">
                                            <div id="div-selTipoUsuario" class="divInput form-group">
                                                <label for="selTipoUsuario" class="control-label col-form-label">Tipo de usuario:</label>
                                                <select name="selTipoUsuario" id="selTipoUsuario" class="form-control" required>
                                                </select>
                                                <div class="alert alert-danger divError oculto" id="errorTipoUsuario">
                                                    <p><b>Debe seleccionar un tipo de usuario</b></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="div-eliminar" class="container oculto">
                                <p><b>¿Esta seguro que desea eliminar este registro?</b></p>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <div id="div-botones">
                                    <input type="submit" name="agregarNuevo" id="agregarNuevo" class="btn btn-success" value="Agregar Nuevo" />
                                    <input type="submit" name="guardarCambios" id="guardarCambios" class="btn btn-warning oculto" value="Guardar" />
                                    <input type="submit" name="eliminarUsuario" id="eliminarUsuario" class="btn btn-warning oculto" value="Eliminar Usuario" />
                                    <button type="button" class="btn btn-danger" id="btnCancelar" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
                require_once '../inc/footer.php'; 
            ?>         
        </div>   
    </body>
</html>