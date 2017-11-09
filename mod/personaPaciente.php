<!DOCTYPE html>
<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Centro terapéutico Francoise Dolto</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
    <script src="../js/jquery-3.2.1.js"></script> 
    <script src="../js/scriptPersonaPaciente.js"></script>  
    <script src="../js/bootstrap.min.js"></script>  
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" type="text/css" href="../lib/DataTables/datatables.min.css"/>
    <script type="text/javascript" src="../lib/DataTables/datatables.min.js"></script>
    <link rel="stylesheet" href="../css/stylePersonaPaciente.css">
</head>
<body >
    <div class="container">
        <?php
        require_once '../inc/header.php'; 
        ?>

        <div class="form-group text-right">
            <a href="#cargo" id="btnCargo" class="btn btn-info btnModal" data-toggle="modal">Nueva persona</a>
        </div>

        <table id="tablaPersonas" class="table table-striped table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                    <th>Id</th>                 
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th></th>
                </tr>
            </thead>

  
        
   </table>

   <div class="text-center form-group">
        <button class="btn btn-asignar btn-principal"><img class="img-asignar" src="../iconos/asignar.png" alt="asignar"></button>
   </div>

   <!-- <table id="tablaPaciente" class="table table-striped table-bordered dt-responsive nowrap">
    <thead>
        <tr><th > Tiene las sigientes personas a cargo </th></tr>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Dirección</th>
            <th>Teléfono</th>    
        </tr>
    </thead>

<tbody>
  <tr>
        <td>1</td>
        <td>Zona 1</td>
        <td>Perimetro 1</td>
        <td>Zona 3</td>
        <td>Perimetro 1</td>
        <td>Perimetro 1</td>
    </tr>


</tbody>

</table> -->


<!--ventana modal Persona a cargo-->

<div class="modal fade" id="cargo"> 
    <div class="modal-dialog"> 
        <div class="modal-content"> 

            <div class="modal-header"> 
               <button type="button" class="close" data-dismiss="modal" aria-hidden="modal">
                   <span class="glyphicon glyphicon-remove"></span>
               </button> 
               <h4 class="modal-title text-center">Persona a cargo</h4>
           </div> 

          <div class="modal-body">
               <form id="frmModal" action="" method="POST">
                  <div id="divNombrePersona" class="form-group  col-md-6"> 
                      <label class="sr-only" for="nombrePersona">Nombre:</label> 
                      <input type="text" class="form-control" id="nombrePersona" placeholder="Nombre:" required>
                      <div class="alert alert-danger oculto" id="errorNombrePersona">
                            <p><b>Ingrese un nombre válido</b></p>
                    </div>
                </div>

            <div id="divApellidoPersona" class="form-group  col-md-6"> 
                <label class="sr-only" for="apellidoPersona">Apellido:</label> 
                <input type="text" class="form-control" id="apellidoPersona" placeholder="Apellido:" required>
                <div class="alert alert-danger oculto" id="errorApellidoPersona">
                        <p><b>Ingrese un apellido válido</b></p>
                </div>
            </div>

            <div id="divDniPersona" class="form-group  col-md-6"> 
                <label class="sr-only" for="dniPersona">DNI:</label> 
                <input type="number" class="form-control" id="dniPersona" placeholder="DNI:" required>
                <div class="alert alert-danger oculto" id="errorDniPersona">
                        <p><b>Ingrese un DNI válido</b></p>
                 </div>
            </div>


            <div id="divTelPersona" class="form-group  col-md-6"> 
                <label class="sr-only" for="telPersona">DNI:</label> 
                <input type="number" class="form-control" id="telPersona" placeholder="Teléfono:" required>
                <div class="alert alert-danger oculto" id="errorTelPersona">
                        <p><b>Ingrese un teléfono válido</b></p>
                </div>
            </div>

            <div id="divDireccionPersona" class="form-group  col-md-12"> 
                    <label class="sr-only" for="dniPersona">Dirección:</label> 
                    <input type="text" class="form-control" id="direccionPersona" placeholder="Dirección:" required>
                    <div class="alert alert-danger oculto" id="errorDireccionPersona">
                            <p><b>Ingrese una dirección</b></p>
                    </div>
            </div>
                  
               <p class="footerCenter">.</p>
               
        </div>
            
             <div class="modal-footer">
                    <div class="col-xs-3">
                            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>                           
                        </div>
                    <div class="col-xs-3">
                        <button type="button" class="btn btn-success btn-block oculto" data-dismiss="modal">Aceptar</button>                           
                    </div>
                    <div class="col-xs-3">
                         <button type="button" class="btn btn-warning btn-block  oculto">Editar</button>                           
                    </div>
                    <div class="col-xs-3">
                         <button type="submit" id="guardarPersona" class="btn btn-success btn-block">Guardar</button>
                    </div>  
            </div>
        </form>
                
        </div>
    </div>
</div>

<!--Fin modal persona a cargo-->
             
    </div>
    <?php
    require_once '../inc/footer.php'; 
    ?>
</body>
</html>