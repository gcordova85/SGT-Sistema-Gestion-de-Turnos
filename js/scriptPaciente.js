"use strict";

$(document).ready(function(){
/*validarNom();
validarApe();
validarDni();
validarDir();
validarTel();*/
validarCampos();

mostrarOcultarPaciente();

removerErroresTodos();

ocultarMsjError();

alternarPantalla()

listar_datos();


$('#tablaTurnos').DataTable();    
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
/*
function validarNom() {
    $("#nom").on("blur",function(){
        esValidoNomApe($(this).val(),$("#errorNom"),$("#divNom"))       
    })
}

function validarApe() {
    $("#ape").on("blur",function(){
        esValidoNomApe($(this).val(),$("#errorApe"),$("#divApe"))
    })
}

function validarDni() {
    $("#dni").on("blur",function(){
        esValidoDni($(this).val(),$("#errorDni"),$("#divDni"))
    })
}

function validarDir() {
    $("#dir").on("blur",function(){
        esValidaDireccion($(this).val(),$("#errorDir"),$("#divDir"))
    })
}

function validarTel() {
    $("#tel").on("blur",function(){
        esValidoTel($(this).val(),$("#errorTel"),$("#divTel"))
    })
}
*/

/*********************************fin de validacion de paciente**************************** */



//***************************comienzo de configuracion de botones*********************************

function habilitarEdicion() { //habilita la edicion del formulario

    $(".btn-paciente").each(function(){
        if($(this).hasClass("oculto")){
            $(this).removeClass("oculto");
            $(this).addClass("visible");
        }else{
            if($(this).hasClass("visible")){
                $(this).removeClass("visible");
                $(this).addClass("oculto");
            }
        }
    });
    
    $(".inp-paciente").each(function(){
        $(this).removeAttr("disabled");
    });
    $(".file-paciente").each(function(){
        $(this).removeClass("oculto");
        $(this).addClass("visible");      
    })
    $(".cert-paciente").each(function(){
        $(this).removeClass("visible");
        $(this).addClass("oculto");      
    })
}

function deshabilitarEdicion() {

    $(".btn-paciente").each(function(){
        if($(this).hasClass("visible")){
            $(this).removeClass("visible");
            $(this).addClass("oculto");
        }else{
            if($(this).hasClass("oculto")){
                $(this).removeClass("oculto");
                $(this).addClass("visible");
            }
        }
    });
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
    })

    $("#btnCancelar").click(function(){
      deshabilitarEdicion();        
    })
}


function alternarPantalla() {
    var divT=$("#divTabla");
    var divF=$("#divFormulario");
    $("#botonNuevo").on("click",function(){
        if($(divT).hasClass("div-visible")){
            $(divT).removeClass("div-visible");
            $(divT).addClass("div-oculto");
        }
        
        if($(divF).hasClass("div-oculto")){
            $(divF).removeClass("div-oculto");
            $(divF).addClass("div-visible");
        }     
    });
    $("#btnAcep").on("click",function(){
        console.log("aceptar");
        if($(divF).hasClass("div-visible")){
            $(divF).removeClass("div-visible");
            $(divF).addClass("div-oculto");
        }
        
        if($(divT).hasClass("div-oculto")){
            $(divT).removeClass("div-oculto");
            $(divT).addClass("div-visible");
        }     
    });
    
}

//********************************************ajax************************************* */


function listar_datos() {
     $('#tablaPacientes').DataTable({
        ajax: {
            url: '../inc/getPaciente.php'
          },
            columns: [
            { data: 'Id_paciente' },
            { data: 'nombre' },
            { data: 'apellido' },
            { data: 'dni' },
            { data: 'telefono' },
            { data: 'Id_obrasocial' },
            { data: 'Id_estado'},
            { defaultContent : "<button type='button' class='editar btn btn-primary' data-toggle='modal' data-target='#modalABM'><i class='fa fa-pencil-square-o'></i></button>	<button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fa fa-trash-o'></i></button>" },
          ]
    });



    // editar_datos("#tablaPacientes tbody",tabla);
};
// var editar_datos = function(tbody, tabla){
//     $(tbody).on("click", "button.editar", function(){
//         var data = tabla.row($(this).parents("tr")).data();
//         console.log(data.id_consultorio);
//         console.log(data.ubicacion);
//         var consultorio = $("#nConsultorio").val(data.id_consultorio),
//         ubicacion = $("#selUbicacion").val(data.ubicacion);
//     });
// };
// var eliminar_datos = function(tbody, tabla){
//     $(tbody).on("click", "button.editar", function(){
//         var data = tabla.row($(this).parents("tr")).data();
//         console.log(data);
//     });
// };
var idioma_espanol = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
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

