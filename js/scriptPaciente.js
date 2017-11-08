"use strict";

$(document).ready(function(){
validarNom();
validarApe();
validarDni();
validarDir();
validarTel();

validarNomEmer();
validarApeEmer();
validarDniEmer();
validarDirEmer();
validarTelEmer();

validarNomPersona();
validarApePersona();
validarDniPersona();
validarDirPersona();
validarTelPersona();

$('#grid').DataTable();
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
            texto.fadeOut(700); 
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


/********************** fin de las funciones generales***************************/    

/*********************************Validacion de paciente**************************** */
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


/*********************************fin de validacion de paciente**************************** */



/*********************************inicio de validacion contacto de emergencia**************************** */

function validarNomEmer() {
    $("#nombreEmergencia").on("blur",function(){
        esValidoNomApe($(this).val(),$("#errorNombreEmergencia"),$("#divNombreEmergencia"))       
    })
}

function validarApeEmer() {
    $("#apellidoEmergencia").on("blur",function(){
        esValidoNomApe($(this).val(),$("#errorApellidoEmergencia"),$("#divApellidoEmergencia"))
    })
}

function validarDniEmer() {
    $("#dniEmergencia").on("blur",function(){
        esValidoDni($(this).val(),$("#errorDniEmergencia"),$("#divDniEmergencia"))
    })
}

function validarDirEmer() {
    $("#direccionEmergencia").on("blur",function(){
        esValidaDireccion($(this).val(),$("#errorDireccionEmergencia"),$("#divDireccionEmergencia"))
    })
}

function validarTelEmer() {
    $("#telEmergencia").on("blur",function(){
        esValidoTel($(this).val(),$("#errorTelEmergencia"),$("#divTelEmergencia"))
    })
}


/*********************************fin de validacion contacto de emergencia**************************** */





/*********************************inicio de validacion de persona a cargo**************************** */
function validarNomPersona() {
    $("#nombrePersona").on("blur",function(){
        esValidoNomApe($(this).val(),$("#errorNombrePersona"),$("#divNombrePersona"))       
    })
}

function validarApePersona() {
    $("#apellidoPersona").on("blur",function(){
        esValidoNomApe($(this).val(),$("#errorApellidoPersona"),$("#divApellidoPersona"))
    })
}

function validarDniPersona() {
    $("#dniPersona").on("blur",function(){
        esValidoDni($(this).val(),$("#errorDniPersona"),$("#divDniPersona"))
    })
}

function validarDirPersona() {
    $("#direccionPersona").on("blur",function(){
        esValidaDireccion($(this).val(),$("#errorDireccionPersona"),$("#divDireccionPersona"))
    })
}

function validarTelPersona() {
    $("#telPersona").on("blur",function(){
        esValidoTel($(this).val(),$("#errorTelPersona"),$("#divTelPersona"))
    })
}
/*********************************fin de validacion de persona a cargo*****************************/

