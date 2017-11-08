<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        header("Location:mod/menu.php");
    }
?>
<!DOCTYPE html>
<html lang="es-AR" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/styleLogin.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
</head>
<body class="fondoLogin">
    <div class="container text-center">
        <div class="page-header hLogin ">
             <header> <h1 class="text-center"> <strong> SGT- Sistema Gestion de Turnos </strong> </h1> </header>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                    <div id="carouselLogin" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                      <li data-target="#carouselLogin" data-slide-to="0" class="active"></li>
                                      <li data-target="#carouselLogin" data-slide-to="1"></li>
                                      <li data-target="#carouselLogin" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                      <div class="item active">
                                        <img src="image/image1.jpg" class="img-responsive" alt="imagen1">
                                      </div>      
                                      <div class="item">
                                        <img src="image/image2.jpg" class="img-responsive" alt="imagen2">
                                      </div>      
                                      <div class="item">
                                        <img src="image/image3.jpg" class="img-responsive" alt="imagen3">
                                      </div>                            
                                    </div>
                            
                                    <a class="left carousel-control" href="#carouselLogin" data-slide="prev">
                                      <span class="glyphicon glyphicon-chevron-left"></span>
                                      <span class="sr-only">Anterior</span>
                                    </a>
                                    <a class="right carousel-control" href="#carouselLogin" data-slide="next">
                                      <span class="glyphicon glyphicon-chevron-right"></span>
                                      <span class="sr-only">Siguiente</span>
                                    </a>
                    </div>                            
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="panel text-center">
                    <div class="panel-heading panel-loginhf">
                        <h2> <strong> Iniciar sesion </strong></h2>
                    </div>
                    <div class="panel-body panel-loginBody">
                        <form id="login-form" class="form-vertical" method="POST">
                            <div class="form-group">
                                <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Ingrese Usuario" required autofocus>              
                            </div>
                            <div id="divErrorUsuario" class="divError alert alert-danger text-left">
                                  <strong>Usuario Incorrecto verifique</strong> 
                            </div>  
                            <div class="form-group">
                                <input id="clave" type="password" class="form-control" name="clave" placeholder="Ingrese su clave"> 
                                <i class="glyphicon glyphicon-eye"></i>
                            </div>
                            <div id="divErrorClave" class="divError alert alert-danger text-left">
                                    <strong>Clave Incorrecta verifique</strong> 
                                    <ul>
                                        <li>La contraseña debe tener al entre 8 y 16 caracteres.</li>
                                    </ul>
                             </div>  
                            <div class="form-group">
                                <input class="btn btn-block btn-login" type="submit" id="btnAceptar" name="btnAceptar" value="Aceptar">
                            </div>
                            <div id="error" class="alert alert-danger divError" >
                                <strong> Usuario o Clave Incorrecta Verifique! </strong>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="contactoLogin">
                <p>INFORMACION      
                    <span class="glyphicon glyphicon-map-marker"></span> Universidad de Ezeiza, Buenos Aires
                    <span class="glyphicon glyphicon-phone"></span> (011) 4480-9800
                    <span class="glyphicon glyphicon-envelope"></span> info@upe.edu.com
                </p> 
            </div>
        </div>
</div>
<script src="js/jquery.js"></script>  
<script src="js/bootstrap.min.js"></script> 
<script src="js/scriptLogin.js"></script>
</body>
</html>
