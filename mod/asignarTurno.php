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
</head>
<body >
    <div class="container">
        <?php
            require_once '../inc/header.php';
        ?>
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <label class="control-label" for="nombre"> Nombre:</label>
                <input class="form-control" type="text" id="nombre" name="nombre">
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <label class="control-label" for="apellido"> Apellido:</label>
                <input class="form-control" type="text" id="apellido" name="apellido">
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <label class="control-label" for="dni"> DNI</label>
                <input class="form-control" type="number" max="99999999" min="11111111" id="dni" name="dni">
            </div>
        </div>
    </div>    
    <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-offset-3 col-md-6">
                <div class="panel panel-loginhf">
                    <div class="panel-heading text-center">
                        Horarios
                    </div>
                    <table class="table table-bordered">
                        <tr class="loginhf">
                            <th>Fechas Disponibles</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>01-11-17</td>
                            <td class="text-center"> 
                                <button id="btnSelHora" name="btnSelHora" class="btn btn-success" data-toggle="modal" data-target="#modalAsignar" > 
                                    <span class="glyphicon glyphicon-plus"></span>Seleccionar horario </button>
                            </td>
                        </tr>
                    </table>  
                </div>
            </div>
        </div>   
        <div id="modalAsignar" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Seleccionar horario</h4>
                    </div>
                        <table class="table table-bordered">
                            <tr class="loginhf">
                                <th >Horarios disponibles</th>    
                            </tr>
                            <tr>
                                <td> 08:00</td> 
                                <td><input type="radio" name="rdHora" id="rdHora"> </td>
                            </tr> 
                            <tr>
                                <td> 08:30</td> 
                                <td><input type="radio" name="rdHora" id="rdHora"> </td>
                            </tr>
                            <tr>
                                <td> 09:00</td> 
                                <td><input type="radio" name="rdHora" id="rdHora"></td>
                            </tr>
                        </table>
                    <div class="modal-footer">
                        <button type="submit" id="btnAceptar" class="btn btn-buscar" data-dismiss="modal"> 
                            <span class="glyphicon glyphicon-ok"></span> Aceptar
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>        
                </div>
            </div>
    </div>
    <?php
        require_once '../inc/footer.php';
    ?>
    <script src="../js/jquery.js"></script>   
    <script src="../js/bootstrap.min.js"></script>     
    <script src="../js/scriptTurnos.js"></script>
</body>
</html>