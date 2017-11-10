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
                <h3 class="text-center">ABM de Obras Sociales y Prepagas</h3>
            </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-8 offset-md-1">
            <button type="button" id="botonNuevo" class="btn btn-abm" data-toggle="modal" data-target="#modalAbmOsocial">Nuevo</button>
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
                <table id="tablaOsocial" class="table table-bordered table-condensed">
                    <tr>
                        <th class="navbar" width=10%>N° Obra Social</th>
                        <th class="navbar">Nombre</th>
                        <th class="navbar">Email</th>
                        <th class="navbar">Telefono</th>
                        <th class="navbar" width = "10%">Opciones</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div id="modalAbmOsocial" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="user_form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header navbar">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Agregar Obra Social/Prepaga</h4>
                    </div>
                    <div class="modal-body">
                        <div id="div-nOsocial" class="form-group">
                            <label for="nOsocial" class="control-label col-form-label">N° Obra Social/Prepaga:</label>
                            <input type="number" name="nOsocial" id="nOsocial" class="form-control">
                        </div>
                        <div id="div-nombreOsocial" class="form-group">
                            <label for="nombreOsocial" class="control-label col-form-label">Nombre:</label>
                            <input type="text" name="nombreOsocial" id="nombreOsocial" class="form-control">
                        </div>
                        <div id="div-emailOsocial" class="form-group">
                            <label for="emailOsocial" class="control-label col-form-label">Email:</label>
                            <input type="email" name="emailOsocial" id="emailOsocial" class="form-control">
                        </div>
                        <div id="div-telefonoOsocial" class="form-group">
                            <label for="telefonoOsocial" class="control-label col-form-label">Telefono:</label>
                            <input type="number" name="telefonoOsocial" id="telefonoOsocial" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                            <input type="button" name="agregarNuevaOsocial" id="agregarNuevaOsocial" class="btn btn-abm" value="Agregar" />
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