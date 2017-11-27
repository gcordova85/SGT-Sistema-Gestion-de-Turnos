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
    <script src="../js/scriptJornadas.js"></script>
    <link rel="stylesheet" type="text/css" href="../lib/DataTables/datatables.min.css"/>
    <script type="text/javascript" src="../lib/DataTables/datatables.min.js"></script>   
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/styleJornadas.css">


</head>
<body >
    <div class="container">
        <?php
            require_once '../inc/header.php';         ?>

            <form id="frmPdc">
                <div  id="divEspecialidad" class="divInput form-group col-md-3">
                <label for="espeialidades" class="control-label">Especialidad:</label>
                    <select name="especialidades" id="especialidades" class="form-control">
                </select>
                    
                     <div class="alert alert-danger divError oculto" id="errorEspecialidad">
                        <p><b>Seleccione una especialidad</b></p>
                    </div>
                </div>  
                <div  id="divProfesional" class="divInput form-group col-md-3">
                <label for="profesional" class="control-label">Profesional:</label>   
                    <select name="profesionales" id="profesionales" class="form-control">
                </select>
                    
                     <div class="alert alert-danger divError oculto" id="errorProfesional">
                        <p><b>Seleccione un profesional</b></p>
                    </div>
             </div>  
             <div  id="divDia" class="divInput form-group col-md-3"> 
             <label for="dia" class="control-label">Día:</label>  
                <select name="dia" id="dia" class="form-control">
                </select>
                
                 <div class="alert alert-danger divError oculto" id="errorDia">
                    <p><b>Seleccione un día de atención</b></p>
                </div>
            </div>  
             <div  id="divConsultorio" class="divInput form-group col-md-3">
             <label for="consultorios" class="control-label">Consultorio:</label>   
                <select name="cons" id="consultorios" class="form-control">
                </select>
                
                 <div class="alert alert-danger divError oculto" id="errorConsultorio">
                    <p><b>Seleccione un consultorio</b></p>
                </div>
            </div>

            <div class=""></div>
                <button  id="btnAgregar" type="submit" class="btn btn-success glyphicon glyphicon-plus">Agregar</button>
            </div>  
        </form>   
            
            <div clas="table-responsive">
            <table id="tablaJornadas" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>Nombre</th> 
                        <th>Apellido</th>                                 
                        <th>Día</th>
                        <th>Consultorio</th> 
                        <th>Ubicacion</th>                 
                               
                    </tr>
                </thead>
            </table>
              
    <?php
        require_once '../inc/footer.php'; 
    ?>
</body>
</html>
