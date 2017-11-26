$(document).ready(function(){

    $("#usuario").on("blur",function() {
        ValidarUsuario();
    })
    $("#clave").on("blur",function() {
        ValidarClave();
    })
    $("#btnAceptar").on("click", function() {
        ValidarUsuarioLogin();
        event.preventDefault();
    })        
})
function ValidarClave() {
    var clave = $("#clave").val();
   /* var patron = /(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}/;
    if (!patron.test(clave)) {
        $("#clave").focus();
        $("#divErrorClave").fadeIn("slow");
        return false; 
    }*/
    if (clave.length == 0) {
        $("#clave").focus();
        $("#divErrorClave").fadeIn("slow");
        return false;
    }
    if (clave.length <= 4) {
        $("#clave").focus();
        $("#divErrorClave").fadeIn("slow");
        return false;
    }
    else{
        $("#divErrorClave").fadeOut();
        return true;
    }
}
function ValidarUsuario() {
    var patron = /[a-zA-Z]/;
    var usuario = $("#usuario").val();
    if (!patron.test(usuario)) {
       $("#divErrorUsuario").fadeIn("slow");
       $("#usuario").focus();
       return false;
     }
    if (usuario.length == 0) {
        $("#divErrorUsuario").fadeIn("slow");
        $("#usuario").focus();
        return false;
    }
    if (usuario.length > 10) {
        $("#divErrorUsuario").fadeIn("slow");
        $("#usuario").focus();
        return false;
    }
    else{
        $("#divErrorUsuario").fadeOut();
        return true;
     }
 }
function ValidarUsuarioLogin(){
    var usuario=$("#usuario").val();
    var clave=$("#clave").val();
    $.ajax({
        type : 'POST',
        url  : 'inc/getUsuario.php',
        data : {
                "usuario":usuario,
                "clave"  :clave,
        },
        success :  function(response){         
            if(response == 1){
                $("#error").fadeOut();
                setTimeout(' window.location.assign ("mod/menu.php"); ',1000);
                }
            else{
                $(".divError").fadeOut();
                $("#error").fadeIn("slow" );
            };
        },
    });
};