
$(document).ready(function(){
        listar_datos();
        agregar();
        ocultarMsjError();
    });

var listar_datos = function(){
    var tabla = $('#tablaJornadas').DataTable({
        destroy: true,
        ajax: {
            url: '../inc/getPaciente.php'
          },
            columns: [
            { data: 'id_paciente' },
            { data: 'id_dia' },
            { data: 'id_consultorio' },
          ],
            language : idioma_espanol
    });
};

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

function validarCampos(){
    esValidoSelect($("#esp").val(),$("#errorEsp"),$("#divEsp"));
    esValidoSelect($("#prof").val(),$("#errorProf"),$("#divProf"));
    esValidoSelect($("#cons").val(),$("#errorCons"),$("#divCons"));
    
    
}

function agregar() {
    $("#btnAgregar").on("click",function(){
        validarCampos();
    })
}

function ocultarMsjError(){ //remueve el mensaje al posicionarse en el campo, solo los mensajes sin remover el error del div
    $("#esp").on("click",function() {
        $("#errorEsp").fadeOut(700); 
    })
    $("#prof").on("click",function() {
        $("#errorProf").fadeOut(700); 
    })
    $("#cons").on("click",function() {
        $("#errorCons").fadeOut(700); 
    })
}