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
        <link rel="stylesheet" href="../css/styleABM.css">
        <link rel="stylesheet" type="text/css" href="../lib/DataTables/datatables.min.css"/>
        <script type="text/javascript" src="../lib/DataTables/datatables.min.js"></script>
        <link rel="stylesheet" href="../css/font-awesome.min.css">
    </head>
    <body>
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
                <button type="button" id="botonNuevo" class="btn btn-abm" data-toggle="modal" data-target="#modalProfesionales" style="margin: 10px">Nuevo</button>
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
                                <th class="navbar">id_especialidad</th>
                                <th class="navbar">Especialidad</th>
                                <th class="navbar">Opciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div id="modalProfesionales" class="modal fade">
            <div class="modal-dialog container">
                <form method="POST" id="nuevoProfesional">
                    <div class="modal-content">
                        <div class="modal-header navbar">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center" id="titulo-modal">Agregar Profesional</h4>
                        </div>
                        <div class="modal-body">
                        <div id="div-formulario">
                            <div class="row oculto">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div id="div-nProfesional" class="form-group">
                                        <label for="nProfesional" class="control-label col-form-label">N° Prof:</label>
                                        <input type="number" name="nProfesional" id="nProfesional" class="form-control">
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="col-md-6">
                                        <div id="div-nombreProfesional" class="divInput form-group">
                                            <label for="nombreProfesional" class="control-label col-form-label">Nombre:</label>
                                            <input type="text" name="nombreProfesional" id="nombreProfesional" class="form-control" pattern="/([A-Za-zñáéíóú]{3,})\s*(([A-Za-zñáéíóú]{3,})){0,1}$/" required>
                                            <div class="alert alert-danger divError oculto" id="errorNom">
                                                <p><b>Ingrese un nombre correcto (Uno o dos de al menos 3 letras c/u)</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="div-apellidoProfesional" class="divInput form-group">
                                            <label for="apellidoProfesional" class="control-label col-form-label">Apellido:</label>
                                            <input type="text" name="apellidoProfesional" id="apellidoProfesional" class="form-control" pattern="/([A-Za-zñáéíóú]{3,})\s*(([A-Za-zñáéíóú]{3,})){0,1}$/" required>
                                            <div class="alert alert-danger divError oculto" id="errorApe">
                                                <p><b>Ingrese un apellido correcto (Uno o dos de al menos 3 letras c/u)</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="col-md-6">
                                        <div id="div-telefonoProfesional" class="divInput form-group">
                                            <label for="telefonoProfesional" class="control-label col-form-label">Telefono:</label>
                                            <input type="number" name="telefonoProfesional" id="telefonoProfesional" class="form-control" min="00000000000" max="99999999999"required>
                                            <div class="alert alert-danger divError oculto" id="errorTel">
                                                <p><b>Ingrese un teléfono valido, ejemplo: 01142325466</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="div-direccionProfesional" class="divInput form-group">
                                            <label for="direccionProfesional" class="control-label col-form-label">Direccion:</label>
                                            <input type="text" name="direccionProfesional" id="direccionProfesional" class="form-control" required>
                                            <div class="alert alert-danger divError oculto" id="errorDir">
                                                <p><b>Debe completar este campo (Calle, numero, piso, dpto, localidad)</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="col-md-6">
                                        <div id="div-emailProfesional" class="divInput form-group">
                                            <label for="emailProfesional" class="control-label col-form-label">Email:</label>
                                            <input type="email" name="emailProfesional" id="emailProfesional" class="form-control" pattern="/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;" required>
                                            <div class="alert alert-danger divError oculto" id="errorMail">
                                                <p><b>Debe ingresar un E-mail valido</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="div-selEspecialidad" class="divInput form-group">
                                            <label for="selEspecialidad" class="control-label col-form-label">Especialidad:</label>
                                            <select name="selEspecialidad" id="selEspecialidad" placeholder="Seleccione especialidad" class="form-control" required>
                                            </select>
                                            <div class="alert alert-danger divError oculto" id="errorEspecialidad">
                                                <p><b>Debe seleccionar una especialidad</b></p>
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
                                <input type="submit" name="eliminarProfesional" id="eliminarProfesional" class="btn btn-warning oculto" value="Eliminar Profesional" />
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
    </body>
</html>