<!DOCTYPE html>
<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultorios Francoise Dolto</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
    <script src="../js/jquery-3.2.1.js"></script>   
    <script src="../js/bootstrap.min.js"></script>  
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/stylePaciente.css">
    <script src="../js/scriptPaciente.js"></script>
    <link rel="stylesheet" type="text/css" href="../lib/DataTables/datatables.min.css"/>
    <script type="text/javascript" src="../lib/DataTables/datatables.min.js"></script>
    <script src="../js/redirectPlugin.js"></script>  
    <link rel="stylesheet" href="../css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        
        <?php
        require_once '../inc/header.php'; 
        ?>
<!--fin del Header-->

<!-- ****************************div tabla************************ -->
        <div id="divTabla" class="div-visible">

        <div class="row" id="fila-encabezado">
            <div class="col-md-12 navbar">
                <h3 class="text-center">ABM de Pacientes</h3>
            </div>
        </div>
        <!-- <div class="row" id="fila-botones">
            <div class="col-md-1"></div>
            <div class="col-md-8 offset-md-1">
                <button type="button" id="botonNuevo" class="btn btn-abm">Nuevo</a> </button>
            </div>
        </div> -->

        <div class="row" id="fila-botones">
            <div class="col-md-1"></div>
            <div class="col-xs-5">
                <a href="menu.php" id="btnVolver" class="btn btn-barra" style="margin: 10px">Volver</a>
            </div>
            <div class="col-xs-5 text-right">
                <button type="button" id="botonNuevo" class="btn btn-barra">Nuevo</button>
            </div>
            <div class="col-md-1 hidden-xs"></div>
        </div>


        <div class="checkbox">
            <label><input id="inactivos" type="checkbox" value="">Inactivos</label>
         </div>
        <div class="row" id="fila-tabla">
            <div class="col-md-1"></div>
            <div class="col-md-10 offset-md-1">
                <div class="table-responsive">
                    <table id="tablaPacientes" class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th class="navbar">N° Paciente</th>
                                <th class="navbar">Paciente</th>
                                <th class="navbar">Dni</th>
                                <th class="navbar">Activo</th>
                                <th class="navbar">Opciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
            <!--******************* fin div tabla****************** -->

        </div>

        <div id="divFormulario" class="div-oculto">
        <form id="frmPrincipal">
                <div class="text-left col-md-6">
                    <label>Número de paciente </label>
                    <label id="lblId"></label>
                </div>
                <div  class="text-right col-md-6">
                    <label id="lblEstado">Borrador</label>
                </div>
          

                 <div  id="divNom" class="divInput col-md-6 form-group">
                     <label for="nom" class="control-label col-form-label">Nombre:</label>                        
                     <input type="text" class="form-control inp-paciente" name="nom" id="nom" pattern="([A-Za-zñáéíóú]{3,})\s*(([A-Za-zñáéíóú]{3,})){0,1}$" disabled required>
                     <div class="alert alert-danger divError oculto" id="errorNom">
                        <p><b>Ingrese un nombre correcto (Uno o dos de al menos 3 letras c/u)</b></p>
                    </div>
                 </div> 

                 <div  id="divApe" class="divInput form-group col-md-6">
                    <label for="ape" class="control-label col-form-label">Apellido:</label>     
                     <input type="text"class="form-control inp-paciente" name="ape" id="ape" pattern="([A-Za-zñáéíóú]{3,})\s*(([A-Za-zñáéíóú]{3,})){0,1}$" disabled required>
                     <div class="alert alert-danger divError oculto" id="errorApe">
                        <p><b>Ingrese un apellido correcto (Uno o dos de al menos 3 letras c/u)</b></p>
                    </div>
                 </div>    

            <div  id="divDni" class="divInput form-group col-md-6">
                    <label for="dir" class="control-label col-form-label">DNI:</label>     
                     <input type="number"class="form-control inp-paciente" name="dni" id="dni" pattern="[0,9]{8}" disabled required>
                     <div class="alert alert-danger divError oculto" id="errorDni">
                        <p><b>Ingrese un DNI correcto (8 números sin puntos)</b></p>
                    </div>
                 </div>    
           
            <div  id="divDir" class="divInput form-group col-md-6">
                    <label for="dir" class="control-label col-form-label">Dirección:</label>     
                     <input type="text"class="form-control inp-paciente" name="dir" id="dir" minlength="10" disabled required>
                     <div class="alert alert-danger divError oculto" id="errorDir">
                        <p><b>Debe completar este campo (Calle, numero, piso, dpto, localidad)</b></p>
                    </div>
                 </div>    
            
            
            <div  id="divTel" class="divInput form-group col-md-6">
                    <label for="tel" class="control-label col-form-label">Teléfono:</label>     
                     <input type="number"class="form-control inp-paciente" name="tel" id="tel" pattern="[0-9]{11}" disabled required>
                     <div class="alert alert-danger divError oculto" id="errorTel">
                        <p><b>Ingrese un teléfono valido, ejemplo: 01142325466</b></p>
                    </div>
                 </div>    
            
                 <div  id="divOs" class="divInput form-group col-md-6">   
                        <label for="os" class="control-label col-form-label">Obra social/Prepaga:</label>   
                        <select name="os" id="os" class="form-control inp-paciente" disabled>
                        </select>
                        
                         <div class="alert alert-danger divError oculto" id="errorOs">
                            <p><b>Seleccione una O.S/Prepaga</b></p>
                        </div>
                 </div>    
             
    
                    <div class="form-group col-md-6">
                            <div class="">
                                <a href="#cargo" id="btnCargo" class="btn btn-block btnModal" data-toggle="modal">Persona a cargo</a>
                            </div>
                    </div>

                    <div class="form-group col-md-6">
                             <div class="">
                                <a href="#turnos"id="btnTurnos" class="btn btn-block btnModal" data-toggle="modal">Historial de turnos</a>        
                            </div>
                    </div>

                    <div id="divCertLink" class="cert-paciente col-md-6 form-group text-center visible">
                        <div>
                        <a id="linkCert" href="">Certificado de discapacidad </a><button type="button" id="btnEditarCert" class="fileEdit btn btn-xs btn-warning glyphicon glyphicon-edit hidden"></button>
                        </div>
                    </div>

                    <div  id="divCert" class="form-group col-md-6 file-paciente oculto">
                            <label for="fileCert" class="control-label col-form-label">Certificado de discapacidad:</label> <button type="button" id="btnNoEditarCert" class="fileNoEdit btn btn-xs btn-danger glyphicon glyphicon-arrow-left "></button>
                             <input type="file" name="fileCert" id="fileCert" class="form-control">
                             <div class="alert alert-danger divError oculto" id="errorCert">
                                <p><b>Debe cargar el certificado</b></p>
                             </div>
                     </div>                                         

                    <div id="divAutorizLink" class="cert-paciente col-md-6 form-group text-center visible">
                        <div>
                        <a id="linkAutoriz" href="">Autorizacion de obra social/prepaga </a> <button type="button" id="btnEditarAutoriz" class="fileEdit btn btn-xs btn-warning glyphicon glyphicon-edit hidden"></button>                       
                        </div>
                    </div>

                     <div  id="divAutoriz" class="form-group col-md-6  oculto file-paciente">
                            <label for="fileAutoriz" class="control-label col-form-label">Autorización de O.S/Prepaga:</label> <button type="button" id="btnNoEditarAutoriz" class="fileNoEdit btn btn-xs btn-danger glyphicon glyphicon-arrow-left "></button>
                             <input type="file" name="fileAutoriz" id="fileAutoriz" class="form-control">
                             <div class="alert alert-danger divError oculto" id="errorAutoriz">
                                <p><b>Debe cargar la autorización</b></p>
                             </div>
                     </div>  




                    <div id="divAcep" class="form-group col-xs-6 col-md-6 visible btn-paciente visible">
                            <div class="">
                                <button type="button" id="btnAcep" class="acciones btn btn-block btn-success glyphicon glyphicon-ok-circle"> Aceptar</button>
                            </div>
                    </div>




                <div id="divEdit" class="form-group col-xs-6 col-md-6 visible btn-paciente visible">
                    <div class="">
                        <button type="button" id="btnEditarPaciente" class="acciones btn btn-block btn-warning glyphicon glyphicon-edit"> Editar</button>
                    </div>
                </div>

               

                <div id="divCancel" class="form-group col-xs-6 col-md-6 btn-paciente oculto">
                    <div class="">
                        <button type="button" id="btnCancelar" class="acciones btn btn-block btn-danger glyphicon glyphicon-remove-circle"> Cancelar</button>                 
                    </div>
                </div>


                <div id="divGuardar" class="form-group col-xs-6 col-md-6 btn-paciente oculto ">
                    <div class="">
                        <button type="submit" id="btnGuardar" class="acciones btn btn-block btn-success 	glyphicon glyphicon-floppy-disk"> Guardar</button>        
                    </div>
                </div>

                <div id="divGuardarC" class="form-group col-xs-6 col-md-6 btn-paciente oculto ">
                    <div class="">
                        <button type="submit" id="btnGuardarCambios" class="acciones btn btn-block btn-success 	glyphicon glyphicon-floppy-disk"> Guardar cambios</button>        
                    </div>
                </div>
            
         </form>


    <!--ventana modal Historial de turnos-->

<div class="modal fade" id="turnos"> 
    <div class="modal-dialog"> 
        <div class="modal-content"> 

            <div class="modal-header"> 
               <button tyle="button" class="close" data-dismiss="modal" aria-hidden="modal">
                   <span class="glyphicon glyphicon-remove"></span>
               </button> 
               <h4 class="modal-title text-center">Historial de turnos</h4>
           </div> 
        <div class="modal-body">
         

            <div class="table-responsive">
                <table id="tablaTurnos" class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Asistió</th>
                        </tr>
                    </thead>
        
            </table>
        </div>


        </div>
            
             <div class="modal-footer">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-success btn-block" data-dismiss="modal">Aceptar</button>                           
                    </div>
            </div>
                
        </div>
    </div>
</div>

<!--Fin modal Historial de turnos-->


   <!--ventana modal Persona a cargo-->

   <div class="modal fade" id="cargo"> 
        <div class="modal-dialog"> 
            <div class="modal-content"> 
    
                <div class="modal-header"> 
                   <button tyle="button" class="close" data-dismiss="modal" aria-hidden="modal">
                       <span class="glyphicon glyphicon-remove"></span>
                   </button> 
                   <h4 class="modal-title text-center">Persona a cargo</h4>
               </div> 
            <div class="modal-body">
             


            <div id="divPersona" class="hidden">
                <table id="tablaPersona" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
                <a href="personaCargo.php" id="btnPers" class="btn btn-info" style="margin: 10px">Gestionar personas</a>
                
                <button type="button" class="btn btn-danger" id="btnCancelarPersona">Cancelar</button>

            </div>

           <div id="divPacientePersona" class="table-responsive">
           <button type="button" class="btn btn-info" id="btnAsignarNueva">Asignar nueva</button>
                <table id="tablaPacientePersona" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Teléfono</th>
                        </tr>
                    </thead>
                </table>
            </div>
    
            </div>
                
                 <div class="modal-footer">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-success btn-block" data-dismiss="modal">Aceptar</button>                           
                        </div>
                </div>
                    
            </div>
        </div>
    </div>
    
<!--Fin modal persona a cargo-->
    




             
    </div>


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
               
            <h3>¿Está seguro que desea eliminar este paciente?</h3>
                  
               <p class="footerCenter">.</p> 
            </div>
            
             <div class="modal-footer">
                    <div class="col-xs-6">
                            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">No</button>                           
                        </div>
                    <div class="col-xs-6">
                         <button type="button" id="eliminarPaciente" class="btn btn-success btn-block visible" data-dismiss="modal">Si</button>
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