<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultorios Francoise Dolto</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <script src="js/jquery-3.2.1.js"></script>   
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scriptabms.js"></script>
    <link rel="stylesheet" href="css/styleBase.css">
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
            <h3 class="text-center">ABM de Profesionales</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-8 offset-md-1">
            <button type="button" id="botonNuevo" class="btn btn-abm" data-toggle="modal" data-target="#modalAbmProfesionales">Nuevo</button>
            <label>Mostrar <select class="inline-form">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select> registros</label>
        </div>
        <div class="col-md-1">
            <input type="search" class="inline-form" placeholder="Buscar...">
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 offset-md-1">
            <div class="table-responsive">
                <table id="tablaProfesionales" class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th class="navbar" width=10%>N° Profesional</th>
                            <th class="navbar">Nombre</th>
                            <th class="navbar">Apellido</th>
                            <th class="navbar">Dni</th>
                            <th class="navbar">Especialidad</th>
                            <th class="navbar">Telefono</th>
                            <th class="navbar">Direccion</th>
                            <th class="navbar">E-mail</th>
                            <th class="navbar">Opciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div id="modalAbmProfesionales" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="user_form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header navbar">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Agregar Profesional</h4>
                    </div>
                    <div class="modal-body">
                        <div id="div-nProfesional" class="form-group">
                            <label for="nProfesional" class="control-label col-form-label">N° Profesional:</label>
                            <input type="number" name="nProfesional" id="nProfesional" class="form-control">
                        </div>
                        <div id="div-nombreProfesional" class="form-group">
                            <label for="nombreProfesional" class="control-label col-form-label">Nombre:</label>
                            <input type="text" name="nombreProfesional" id="nombreProfesional" class="form-control">
                        </div>
                        <div id="div-apellidoProfesional" class="form-group">
                            <label for="apellidoProfesional" class="control-label col-form-label">Apellido:</label>
                            <input type="text" name="apellidoProfesional" id="apellidoProfesional" class="form-control">
                        </div>
                        <div id="div-numeroDni" class="form-group">
                            <label for="numeroDni" class="control-label col-form-label">Dni:</label>
                            <input type="number" name="numeroDni" id="numeroDni" class="form-control">
                        </div>
                        <div id="div-selEspecialidad" class="form-group">
                            <label for="selEspecialidad" class="control-label col-form-label">Especialidad:</label>
                            <select name="selEspecialidad" id="selEspecialidad" placeholder="Seleccione especialidad" class="form-control">
                                    <option>Psicologo</option>
                                    <option>Psicopedagogo</option>
                                    <option>Enfermero</option>
                            </select>
                        </div>
                        <div id="div-telefonoProfesional" class="form-group">
                            <label for="telefonoProfesional" class="control-label col-form-label">Telefono:</label>
                            <input type="number" name="telefonoProfesional" id="telefonoProfesional" class="form-control">
                        </div>
                        <div id="div-direccionProfesional" class="form-group">
                            <label for="direccionProfesional" class="control-label col-form-label">Direccion:</label>
                            <input type="text" name="direccionProfesional" id="direccionProfesional" class="form-control">
                        </div>
                        <div id="div-emailProfesional" class="form-group">
                            <label for="emailProfesional" class="control-label col-form-label">Email:</label>
                            <input type="email" name="emailProfesional" id="emailProfesional" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                            <input type="button" name="agregarNuevoProfesional" id="agregarNuevoProfesional" class="btn btn-abm" value="Agregar" />
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