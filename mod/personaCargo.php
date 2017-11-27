<!DOCTYPE html>
<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Centro terapéutico Francoise Dolto</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
    <script src="../js/jquery-3.2.1.js"></script> 
    <script src="../js/scriptPersonaCargo.js"></script>  
    <script src="../js/bootstrap.min.js"></script>  
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" type="text/css" href="../lib/DataTables/datatables.min.css"/>
    <script type="text/javascript" src="../lib/DataTables/datatables.min.js"></script>
    <link rel="stylesheet" href="../css/stylePersonaCargo.css">
</head>
<body >
    <div class="container">
        <?php
        require_once '../inc/header.php'; 
        ?>


        <div class="form-group text-right">
            <a href="#cargo" id="btnCargo" class="btn btn-info btnModal" data-toggle="modal">Nueva persona</a>
        </div>
        <div class="checkbox">
            <label><input id="inactivos" type="checkbox" value="">Inactivos</label>
         </div>
        <div clas="table-responsive">
        <table id="tablaPersonas" class="table table-striped table-bordered nowrap">
            <thead>
                <tr>
                    <th>Id</th>                 
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Activo</th>
                    <th></th>
                </tr>
            </thead>
   </table>
   </div>
   
  

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
                    <label class="sr-only" for="direccionPersona">Dirección:</label> 
                    <input type="text" class="form-control" id="direccionPersona" placeholder="Dirección:" required>
                    <div class="alert alert-danger oculto" id="errorDireccionPersona">
                            <p><b>Ingrese una dirección</b></p>
                    </div>
            </div>
                  
               <p class="footerCenter">.</p>
               
        </div>
            
             <div class="modal-footer">
                    <div class="col-xs-6">
                            <button type="button" class="btn btn-danger btn-block visible" data-dismiss="modal">Cancelar</button>                           
                        </div>
                    <div class="col-xs-6">
                         <button type="submit" id="guardarPersona" class="btn btn-success btn-block visible">Guardar</button>
                    </div>
                    <div class="col-xs-6">
                         <button type="submit" id="cambiosPersona" class="btn btn-success btn-block oculto disabled">Guardar cambios</button>
                    </div>  
            </div>
        </form>
                
        </div>
    </div>
</div>

<!--Fin modal persona a cargo-->

<div class="modal fade" id="modalEliminar"> 
    <div class="modal-dialog"> 
        <div class="modal-content"> 

            <div class="modal-header"> 
               <button type="button" class="close" data-dismiss="modal" aria-hidden="modal">
                   <span class="glyphicon glyphicon-remove"></span>
               </button> 
               <h4 class="modal-title text-center">Eliminar</h4>
           </div> 

            <div class="modal-body">
               
            <h3>¿Está seguro que desea eliminar esta persona?</h3>
                  
               <p class="footerCenter">.</p> 
            </div>
            
             <div class="modal-footer">
                    <div class="col-xs-6">
                            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">No</button>                           
                        </div>
                    <div class="col-xs-6">
                         <button type="button" id="eliminarPersona" class="btn btn-success btn-block visible" data-dismiss="modal">Si</button>
                    </div>  
            </div>
        
                
        </div>
    </div>
</div>

             
    </div>
    <?php
    require_once '../inc/footer.php'; 
    ?>
</body>
</html>