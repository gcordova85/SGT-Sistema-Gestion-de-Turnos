
$(document).ready(function(){

validarCampos();

mostrarOcultarPaciente();

removerErroresTodos();

ocultarMsjError();

listar_datos();

nuevoPaciente();

editarArchivos();

guardar();

guardarCambios();

asignarPersona();

cargarTurnos();

// listarPersonaPaciente();

// listarPersonas();
// mostrarPersonas();
habilitar();

})





/********************** funciones generales***************************/    


/* funcion para validar todos los nombres y apellidos recibe como parametros
el valor del input, el mensaje de error que se muestra en pantalla y el div que contiene el input*/
function esValidoNomApe(valor,texto,div) {
    var filtro=/([A-Za-zñáéíóú]{3,})\s*(([A-Za-zñáéíóú]{3,})){0,1}$/; 
        if (filtro.test(valor) == false) {
            texto.fadeIn(700);
            div.addClass("has-error");
            return false;
        }else{           
            if (div.hasClass("has-error")) {
                div.removeClass("has-error");       
            }  
            //texto.fadeOut(700); 
            return true;            
            }                    
        }


/**funcion para validar DNI */
function esValidoDni(valor,texto,div){
    if (isNaN(valor) || valor.length < 8 || valor.length > 8) {
        texto.fadeIn(700);
        div.addClass("has-error");
        return false;
    }else{           
        if (div.hasClass("has-error")) {
            div.removeClass("has-error");       
        }  
        texto.fadeOut(700); 
        return true;            
        }                    
}

function esValidaDireccion(valor,texto,div){
    if (valor.length < 10) {
        texto.fadeIn(700);
        div.addClass("has-error");
        return false;
    }else{           
        if (div.hasClass("has-error")) {
            div.removeClass("has-error");       
        }  
        texto.fadeOut(700); 
        return true;            
        }                    
}

function esValidoTel(valor,texto,div){
    if (isNaN(valor) || valor.length < 11 || valor.length > 11) {
        texto.fadeIn(700);
        div.addClass("has-error");
        return false;
    }else{           
        if (div.hasClass("has-error")) {
            div.removeClass("has-error");       
        }  
        texto.fadeOut(700); 
        return true;            
        }                    
}

function esValidoSelect(valor,texto,div) {
    if (valor == 0) {
        texto.fadeIn(700);
        div.addClass("has-error");
        return false;
    }else{           
        if (div.hasClass("has-error")) {
            div.removeClass("has-error");       
        }  
        texto.fadeOut(700); 
        return true;            
        } 
    
}


/********************** fin de las funciones generales***************************/  

//remocion de mensajes de errores

function ocultarMsjError(){ //remueve el mensaje al posicionarse en el campo, solo los mensajes sin remover el error del div
    $("#nom").on("click",function() {
        $("#errorNom").fadeOut(700); 
    })
        
    $("#ape").on("click",function() {
        $("#errorApe").fadeOut(700); 
    })
 
    $("#dni").on("click",function() {
        $("#errorDni").fadeOut(700); 
    })

    $("#dir").on("click",function() {
        $("#errorDir").fadeOut(700); 
    })

    $("#tel").on("click",function() {
        $("#errorTel").fadeOut(700); 
    })

    $("#os").on("click",function() {
        $("#errorOs").fadeOut(700); 
    })
              
}



function removerErroresTodos(){ //remueve todos los mensajes de errores al cancelar la edicion
    $("#btnCancelar").on("click",function() {
        $(".divInput").each(function() {
            if($(this).hasClass("has-error")){
                $(this).removeClass("has-error");
            }
        })
        $(".divError").each(function(){
            $(this).fadeOut(700);
        })
    })
}

//**************************** */


/*********************************Validacion de paciente**************************** */

function validarCampos(){
    $("#btnGuardar").on("click",function(){
        esValidoNomApe($("#nom").val(),$("#errorNom"),$("#divNom"));       
        
        esValidoNomApe($("#ape").val(),$("#errorApe"),$("#divApe"));
         
        esValidoDni($("#dni").val(),$("#errorDni"),$("#divDni"));
          
        esValidaDireccion($("#dir").val(),$("#errorDir"),$("#divDir"));
          
        esValidoTel($("#tel").val(),$("#errorTel"),$("#divTel"));

        esValidoSelect($("#os").val(),$("#errorOs"),$("#divOs"));

    })      
}


/*********************************fin de validacion de paciente**************************** */



//***************************comienzo de configuracion de botones*********************************




function habilitarEdicion() { //habilita la edicion del formulario
    
    $(".inp-paciente").each(function(){
        $(this).removeAttr("disabled");
    });
    $(".fileEdit").each(function(){
        $(this).removeClass("hidden");
    })
    
}


function estadoNuevo() {//estados de los botones
    obtenerOs();
    $("#divEdit").removeClass("visible");
    $("#divEdit").addClass("oculto");

    $("#divAcep").removeClass("visible");
    $("#divAcep").addClass("oculto");

    $("#divGuardar").removeClass("oculto");
    $("#divGuardar").addClass("visible");

    $("#divCancel").removeClass("oculto");
    $("#divCancel").addClass("visible");
    
    $("#divGuardarC").removeClass("visible");
    $("#divGuardarC").addClass("oculto");
    
    $("#divCertLink").removeClass("visible");
    $("#divCertLink").addClass("oculto");

    $("#divCert").removeClass("oculto");
    $("#divCert").addClass("visible");

    $("#divAutorizLink").removeClass("visible");        
    $("#divAutorizLink").addClass("oculto");

    $("#divAutoriz").removeClass("oculto");
    $("#divAutoriz").addClass("visible");

    $(".fileNoEdit").each(function(){
        $(this).addClass("hidden");
    })
}
function estadoEdicion() {
    obtenerOs();
    $("#divEdit").removeClass("visible");
    $("#divEdit").addClass("oculto");

    $("#divAcep").removeClass("visible");
    $("#divAcep").addClass("oculto");

    $("#divGuardar").removeClass("visible");
    $("#divGuardar").addClass("oculto");

    $("#divCancel").removeClass("oculto");
    $("#divCancel").addClass("visible");

    $("#btnEditarCert").removeClass("hidden");
    $("#btnEditarAutoriz").removeClass("hidden");
    
    $("#divGuardarC").removeClass("oculto");
    $("#divGuardarC").addClass("visible");

    $(".fileNoEdit").each(function(){
        $(this).removeClass("hidden");
    })
}

function estadoDetalles() {
    obtenerOs();
    $("#divEdit").removeClass("oculto");
    $("#divEdit").addClass("visible");

    $("#divAcep").removeClass("oculto");
    $("#divAcep").addClass("visible");

    $("#divGuardar").removeClass("visible");
    $("#divGuardar").addClass("oculto");

    $("#divCancel").removeClass("visible");
    $("#divCancel").addClass("oculto");

    $("#divGuardarC").removeClass("visible");
    $("#divGuardarC").addClass("oculto");

    $("#btnEditarCert").addClass("hidden");
    $("#btnEditarCert").addClass("hidden");

    $("#btnEditarAutoriz").addClass("hidden");
    $("#btnEditarAutoriz").addClass("hidden");
}

function deshabilitarEdicion() {
    $(".alert").each(function(){
        $(this).addClass("oculto");            
    }) 
    $(".inp-paciente").each(function(){
        $(this).attr("disabled","true");
    });
    $(".file-paciente").each(function(){
        $(this).removeClass("visible");
        $(this).addClass("oculto");      
    })
    $(".cert-paciente").each(function(){
        $(this).removeClass("oculto");
        $(this).addClass("visible");      
    })
    
}

function mostrarOcultarPaciente() {
    $("#btnEditarPaciente").click(function() {
        habilitarEdicion();
        estadoEdicion();    
    })

    $("#btnCancelar").click(function(){
        deshabilitarEdicion(); 
      mostrarTabla();
    })
}

function editarArchivos() {
    $("#btnEditarCert").on("click", function(){
        $("#divCertLink").removeClass("visible");
        $("#divCertLink").addClass("oculto");

        $("#divCert").removeClass("oculto");
        $("#divCert").addClass("visible");
    })
    $("#btnEditarAutoriz").on("click", function(){
        $("#divAutorizLink").removeClass("visible");        
        $("#divAutorizLink").addClass("oculto");

        $("#divAutoriz").removeClass("oculto");
        $("#divAutoriz").addClass("visible");
    })

    $("#btnNoEditarCert").on("click", function(){
        $("#divCert").removeClass("visible");
        $("#divCert").addClass("oculto");

        $("#divCertLink").removeClass("oculto");
        $("#divCertLink").addClass("visible");
    })

    $("#btnNoEditarAutoriz").on("click", function(){
        $("#divAutoriz").removeClass("visible");
        $("#divAutoriz").addClass("oculto");

        $("#divAutorizLink").removeClass("oculto");        
        $("#divAutorizLink").addClass("visible");
    })
}

function mostrarForm(){
    var divT=$("#divTabla");
    var divF=$("#divFormulario");
    if($(divT).hasClass("div-visible")){
        $(divT).removeClass("div-visible");
        $(divT).addClass("div-oculto");
    }
    
    if($(divF).hasClass("div-oculto")){
        $(divF).removeClass("div-oculto");
        $(divF).addClass("div-visible");
    }     
}

function mostrarTabla(){
    var divT=$("#divTabla");
    var divF=$("#divFormulario");
    if($(divF).hasClass("div-visible")){
        $(divF).removeClass("div-visible");
        $(divF).addClass("div-oculto");
    }
    
    if($(divT).hasClass("div-oculto")){
        $(divT).removeClass("div-oculto");
        $(divT).addClass("div-visible");
    }   
}
function eliminarRegistros(tabla){
    $('#tablaPacientes tbody').on( 'click', 'a.btn-eliminar', function () { 
        var data=tabla.row($(this).parents("tr")).data();
        var id=data.id_paciente;
        $("#eliminarPaciente").on("click",function() {      
             bajaPaciente("../inc/bajaPaciente.php",id);
             tabla.ajax.reload();
        })
})
}
function alternarPantalla(tabla) {
    $("#botonNuevo").on("click",function(){
        habilitarEdicion();
       estadoNuevo();
        mostrarForm();
    });
    $("#btnAcep").on("click",function(){
        mostrarTabla();  
    });

    $('#tablaPacientes tbody').on( 'click', 'button.btnVerMas',function(){
        mostrarForm(); 
        estadoDetalles();
        var data=tabla.row($(this).parents("tr")).data();
        var id=data.id_paciente;
        var data=[]; //creo un json con los datos
        data.push(  
            {"id":id},
        );
        var datos={"data":data};
        var json= JSON.stringify(datos); //convierto el array de objetos en una cadena json
        __ajax("../inc/getPacienteId.php",{"json":json})

        .done(function(info) {
            if(info){//si hay respuesta
                var persona=JSON.parse(info);
                console.log(info);
                $("#lblId").text(persona.data[0].id_paciente);
                $("#nom").val(persona.data[0].nombre);
                $("#ape").val(persona.data[0].apellido);
                $("#dni").val(persona.data[0].dni);
                $("#dir").val(persona.data[0].direccion);
                $("#tel").val(persona.data[0].telefono);
                $("#os").val(persona.data[0].id_obrasocial);   
                $("#linkAutoriz").attr("href",persona.data[0].autorizacion);
                $("#linkCert").attr("href",persona.data[0].certificado);
                $("#fileAutoriz").attr("value",persona.data[0].autorizacion);
                $("#fileCert").attr("value",persona.data[0].certificado);

                if(persona.data[0].estado==1){
                    $("#lblEstado").text("Activo");      
                }else{
                    $("#lblEstado").text("Inactivo");                          
                }
                
            }});

        
    });
    
}

//********************************************ajax************************************* */


function __ajax(url,data){ //funcion general para enviar o traer datos
    var ajax = $.ajax({
        "method":"POST",
        "url":url,
         

        "data":data

    })
    return ajax;
}

function habilitar() {
   
        $("#btnCargo").on("click",function() {
            mostrarPersonas();
        }) 
}
function mostrarPersonas() {
    var cargar=true;
    
    if(cargar){
    var idPac=$("#lblId").text();   
    var tablaPacientePersona= $('#tablaPacientePersona').DataTable({
      ajax: {
          method: "GET",
          url: "../inc/getPersonaPaciente.php",
          data: {"idPaciente":idPac},
      },          
          columns: [
          { data: 'persona' }, 
          { data: 'direccion' },                   
          { data: 'telefono' }
        ],
        "bPaginate": false, 
        "bLengthChange": false,
        "bFilter":false,
        "bInfo":false,
         
  });

  var tablaPersona= $('#tablaPersona').DataTable({
    ajax: {
        method: "GET",
        url: "../inc/getPersonaAsignar.php",
        data: {"idPaciente":idPac},
    },          
        columns: [
        { data: 'persona' }, 
        { data: 'dni' },  
        { defaultContent : "<button type='button' class='btnAsignar btn-xs btn btn-success'>Asignar</button>" },
        
      ],
      "bPaginate": false, 
      "bLengthChange": false,
      "bFilter":true,
      "bInfo":false,
       
});
}
cargar=false;
    $("#btnCargo").on("click",function() {
        $("#divPacientePersona").removeClass("hidden");
        $("#divPersona").addClass("hidden");
        // tablaPacientePersona.ajax.reload();
        // tablaPersona.ajax.reload();
    })
    $("#btnAsignarNueva").on("click",function() {
        $("#divPacientePersona").addClass("hidden");
        $("#divPersona").removeClass("hidden");
    })
    $("#btnCancelarPersona").on("click",function() {
        $("#divPacientePersona").removeClass("hidden");
        $("#divPersona").addClass("hidden");
    })


}


function listar_datos() {
   var tabla= $('#tablaPacientes').DataTable({
        ajax: {
            url: '../inc/getPacientesTodos.php'
        },
            columns: [
            { data: 'id_paciente' },
            { data: 'paciente'},
            { data: 'dni'},
            { data: 'estado'},
            { defaultContent : "<button type='button' id='btnVerMas' class='btnVerMas btn-xs btn btn-info'>Ver mas</button><a href='#modalEliminar' class='btn-xs btn-tabla btn-eliminar btn btn-danger glyphicon glyphicon-remove' data-toggle='modal' ></i></a>" },
          ],
          columnDefs:[
            {targets: [ 0 ],
            visible: false,
            searchable: false},
            {targets: [ 3 ],
            visible: false,
            searchable: true}
            ],
         language: idioma_espanol
    });

    alternarPantalla(tabla);
    eliminarRegistros(tabla);

    
    tabla.columns(3).search("1").draw();                          
    

    $("#inactivos").on("change",function(){
        if( $(this).is(':checked') ) {
            tabla.columns(3).search("0").draw();                          
        }else{
            tabla.columns(3).search("1").draw();                                      
        }
    })

};
var idioma_espanol = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando del _START_ al _END_ de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
};


///*************************carga de datos****************************** */


function nuevoPaciente(){
        $("#botonNuevo").on("click",function(){
            $('#frmPrincipal').trigger("reset");


            __ajax("../inc/getUltimoPaciente.php","")
            
                    .done(function(info) {
                        if(info){
                            var persona=JSON.parse(info);
                            // console.log(info);
                            var ultimoId=persona.data[0].id_paciente;
                            $("#lblId").text(parseInt(ultimoId)+1);                            
                        }});         
        })
    }

 function guardar() {
     $("#btnGuardar").on("click",function(){
         var url= "../inc/setPaciente.php";
         enviarDatos(url);
     })
 }
 function guardarCambios() {
    $("#btnGuardarCambios").on("click",function(){
        var url= "../inc/updatePaciente.php";        
        enviarDatos(url);
    })
}

    
function enviarDatos(url) {
    $("#frmPrincipal").on("submit", function(){
        // e.preventDefault();
        var id = $("#lblId").text();
        var formData = new FormData(document.getElementById("frmPrincipal"));
        formData.append("id", id);
        formData.append("estado", "1");
        
        $.ajax({
            url: url,
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
     processData: false
        })
            .done(function(res){
                console.log(res);
                // $("#mensaje").html("Respuesta: " + res);
            });
    });
    
}


    function asignarPersona(){
        $("#btnAsignar").on("click",function(){
            var id = $("#lblId").text();       
            $.redirect( "../mod/personaCargo.php");//, { 'id': id} );        
        })
        
    }


    function bajaPaciente(url,id) {
        
        var data=[]; //creo un json con los datos
        data.push(  
            {"id":id},
        );
        var datos={"data":data};
        var json= JSON.stringify(datos); //convierto el array de objetos en una cadena json
        __ajax(url,{"json":json})

         .done(function(info) {
        //     if(info){//si hay respuesta
                 console.log(info);
    
            // }
            });
}

function cargarTurnos() {
    var cargar=true;
    $("#btnTurnos").on("click",function() {

       if (cargar)  {
           var idPac=$("#lblId").text();
        
        var tablaTurnos= $('#tablaTurnos').DataTable({
          ajax: {
              url: "../inc/getTurnoPaciente.php?id="+idPac         
          },          
              columns: [
              { data: 'fecha' },        
              { data: 'hora' },
              { data: 'estado' }      
            ],
            columnDefs : [
                 { targets : [2],
                 render : function (data, type, row) { 
                     switch(data) {
                          case '1' : return 'Ausente'; 
                          break; 
                          case '2' : return 'Asistió'; 
                          break;
                          case '0' : return 'Cancelado'; 
                          break; 
                          default : return 'N/A';
                         } 
                    } 
                } 
            ] 
      });}
      cargar=false;
    })
}


function obtenerOs() {
    $.ajax({
        type: "POST",
        url: "../inc/getOsForSelect.php",
        contentType: "application/json; charset=utf-8",
        data: null,
        dataType: "json",
        success: function (result) {
                $('#os').empty();   
                $option= $("<option></option>");
                $option.attr("value",'0');
                $option.text('Seleccione una opcion');
                $('#os').append($option);

            $.each(result, function () {
               $option= $("<option></option>");
               $option.attr("value",this.id_obrasocial);
               $option.text(this.nombre);
               $('#os').append($option);
            }); 
        },
        error: function (xhr, status, error) {
            alert("ERROR")
        }
    });
   
}



