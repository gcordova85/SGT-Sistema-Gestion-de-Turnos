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

            <form>
                <div  id="divEsp" class="divInput form-group col-md-3">   
                    <select name="esp" id="esp" class="form-control">
                        <option value="0">Especialidad</option>
                        <option value="1">Opcion 1</option>
                    </select>
                    
                     <div class="alert alert-danger divError oculto" id="errorEsp">
                        <p><b>Seleccione una especialidad</b></p>
                    </div>
                </div>  
                <div  id="divProf" class="divInput form-group col-md-3">   
                    <select name="prof" id="prof" class="form-control">
                        <option value="0">Profesional</option>
                        <option value="1">Opcion 1</option>
                    </select>
                    
                     <div class="alert alert-danger divError oculto" id="errorProf">
                        <p><b>Seleccione un profesional</b></p>
                    </div>
             </div>  
             <div  id="divCons" class="divInput form-group col-md-3">   
                <select name="cons" id="cons" class="form-control">
                    <option value="0">Consultorio</option>
                    <option value="1">Opcion 1</option>
                </select>
                
                 <div class="alert alert-danger divError oculto" id="errorCons">
                    <p><b>Seleccione un consultorio</b></p>
                </div>
            </div>  
        </form>   
           <div class="col-md-offset-10"></div>
                <button  id="btnAgregar" class="btn btn-success glyphicon glyphicon-plus">Agregar</button>
        </div> 
            <div clas="table-responsive">
            <table id="tablaJornadas" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>Profesional</th>                 
                        <th>Día</th>
                        <th>Consultorio</th>                                
                    </tr>
                </thead>
            </table>
              
    <?php
        require_once '../inc/footer.php'; 
    ?>
</body>
</html>
