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
                    <h3 class="text-center">ABM de Pacientes</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-8 offset-md-1">
                    <button type="button" id="botonNuevo" class="btn btn-abm">Nuevo</button>
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
                        <table id="user_data" class="table table-bordered table-condensed">
                            <tr>
                                <th class="navbar" width="10%">N° Paciente</th>
                                <th class="navbar" width="10%">Nombre</th>
                                <th class="navbar" width="10%">Apellido</th>
                                <th class="navbar" width="10%">Dni</th>
                                <th class="navbar" width="10%">Obra Social</th>
                                <th class="navbar" width="10%">Profesional</th>
                                <th class="navbar" width="10%">Consultorio</th>
                                <th class="navbar" width="10%" >Asistencia</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Juan</td>
                                <td>Nuñez</td>
                                <td>2313213</td>
                                <td>Osde</td>
                                <td>Dra.Cataña</td>
                                <td>2</td>
                                <td><input type="checkbox"></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Juan</td>
                                <td>Nuñez</td>
                                <td>2313213</td>
                                <td>Osde</td>
                                <td>Dra.Cataña</td>
                                <td>2</td>
                                <td><input type="checkbox"></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Juan</td>
                                <td>Nuñez</td>
                                <td>2313213</td>
                                <td>Osde</td>
                                <td>Dra.Cataña</td>
                                <td>2</td>
                                <td><input type="checkbox"></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Juan</td>
                                <td>Nuñez</td>
                                <td>2313213</td>
                                <td>Osde</td>
                                <td>Dra.Cataña</td>
                                <td>2</td>
                                <td><input type="checkbox"></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Juan</td>
                                <td>Nuñez</td>
                                <td>2313213</td>
                                <td>Osde</td>
                                <td>Dra.Cataña</td>
                                <td>2</td>
                                <td><input type="checkbox"></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Juan</td>
                                <td>Nuñez</td>
                                <td>2313213</td>
                                <td>Osde</td>
                                <td>Dra.Cataña</td>
                                <td>2</td>
                                <td><input type="checkbox"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div> 
    </div>
    <footer>
            <div class="container text-right">
              <h5>Centro terapéutico Francoise Dolto</h5>
            </div>
    </footer>
</body>
</html>