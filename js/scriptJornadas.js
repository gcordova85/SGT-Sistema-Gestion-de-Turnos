
$(document).ready(function(){
        listar_datos();
        agregar();
        ocultarMsjError();
        obtenerEspecialidades();
    });

var listar_datos = function(){
    var tabla = $('#tablaJornadas').DataTable({
        destroy: true,
        ajax: {
            url: '../inc/getPdc.php'
          },
            columns: [
            { data: 'profesional' },    
            { data: 'nombre_dia' },
            { data: 'id_consultorio'}, 
            { data: 'ubicacion_consultorio'},                       
          ],
            language : idioma_espanol
    })
    var data = tabla.column(0).data().concat(tabla.column(1).data);
    
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
    esValidoSelect($("#especialidades").val(),$("#errorEspecialidad"),$("#divEspecialidad"));    
    esValidoSelect($("#dia").val(),$("#errorDia"),$("#divDia"));
    esValidoSelect($("#profesionales").val(),$("#errorProfesional"),$("#divProfesional"));
    esValidoSelect($("#consutorios").val(),$("#errorConsutorio"),$("#divConsutorio"));
    
    
}

function guardar_datos(urlPHP,datos){
    $("#frmPdc").on("submit", function(){
        $.ajax({
                method: "POST",
                url: urlPHP,
                data: datos,
            }).done(function(info){
                console.log(info);
            });
        });
};

function agregar() {
    $("#btnAgregar").on("click",function(){
        validarCampos();
        var url = '../inc/setPdc.php';
        var idProfesional = $("#profesionales").val(),
        idDia = $("#dia").val(),
        idConsultorio = $("#consultorios").val(),
        estado = 1
        var data={'idProfesional':idProfesional,
        'idDia':idDia,
        'idConsultorio':idConsultorio,
        'estado':estado}
        guardar_datos(url,data);
    })      
};
    

function ocultarMsjError(){ //remueve el mensaje al posicionarse en el campo, solo los mensajes sin remover el error del div
    $("#especialidad").on("click",function() {
        $("#errorEspecialidad").fadeOut(700); 
    })
    $("#profesional").on("click",function() {
        $("#errorProfesional").fadeOut(700); 
    })
    $("#consultorio").on("click",function() {
        $("#errorConsultorio").fadeOut(700); 
    })
}

function obtenerEspecialidades() {
    $.ajax({
        type: "POST",
        url: "../inc/getEspecialidades.php",
        contentType: "application/json; charset=utf-8",
        data: null,
        dataType: "json",
        success: function (result) {
                $('#profesionales').empty();   
                $option= $("<option></option>");
                $option.attr("value",'0');
                $option.text('Seleccione una opcion');
                $('#especialidades').append($option);

            $.each(result, function () {
               $option= $("<option></option>");
               $option.attr("value",this.id_especialidad);
               $option.text(this.descripcion);
               $('#especialidades').append($option);
            }); 
            obtenerProfesionales();
        },
        error: function (xhr, status, error) {
            alert("ERROR")
        }
    });
    $("#especialidades").on('change',function(){
        $("#idConsultorio").val("");
        $("#ubicacionConsultorio").val("");
        obtenerProfesionales();    
    }); 
}




function obtenerProfesionales() {
    var idEspecialidad = $("#especialidades").val();
    $.ajax({
        type: "GET",
        url: "../inc/getProfesionalByEspecialidad.php",
        contentType: "application/json; charset=utf-8",
        data: {
            "idEspecialidad":idEspecialidad,
        },
        dataType: "json",
        success: function (result) {
            $('#profesionales').empty();
            $option= $("<option></option>");
            $option.attr("value",'0');
            $option.text('Seleccione una opcion');
            $('#profesionales').append($option);

            $.each(result, function () {
               $option= $("<option></option>");
               $option.attr("value",this.id_profesional);
               $option.text(this.nombre +" "+ this.apellido);
               $('#profesionales').append($option);
            }); 
            obtenerDias();                
        },
        error: function (xhr, status, error) {
            alert("ERROR")
        }
    });
    $("#profesionales").on('change',function(){    
        obtenerDias();    
    }); 
}


function obtenerDias() {
    var idProfesional = $("#profesionales").val();
    $.ajax({
        type: "GET",
        url: "../inc/getDiasLibresByProfesional.php",
        contentType: "application/json; charset=utf-8",
        data: {
            "idProfesional":idProfesional,
        },
        dataType: "json",
        success: function (result) {
            $('#dia').empty();
            $option= $("<option></option>");
            $option.attr("value",'0');
            $option.text('Seleccione una opcion');
            $('#dia').append($option);

            $.each(result, function () {
               $option= $("<option></option>");
               $option.attr("value",this.id_dia);
               $option.text(this.nombre);
               $('#dia').append($option);
            }); 
            obtenerConsultorios();                
        },
        error: function (xhr, status, error) {
            alert("ERROR")
        }
        
    });
    $("#dia").on('change',function(){ 
        obtenerConsultorios();    
    }); 
}

function obtenerConsultorios() {
    var idDia = $("#dia").val();
    var idProfesional = $("#profesionales").val();
    $.ajax({
        type: "GET",
        url: "../inc/getConsultoriosLibresByDia.php",
        contentType: "application/json; charset=utf-8",
        data: {
            "idDia":idDia,
            "idProfesional":idProfesional
        },
        dataType: "json",
        success: function (result) {
            $('#consultorios').empty();
            $option= $("<option></option>");
            $option.attr("value",'0');
            $option.text('Seleccione una opcion');
            $('#consultorios').append($option);               
            $.each(result, function () {
               $option= $("<option></option>");
               $option.attr("value",this.id_consultorio);
               $option.text("N° "+this.id_consultorio +" - "+ this.ubicacion);
               $('#consultorios').append($option);
            }); 
        },
        error: function (xhr, status, error) {
            alert("ERROR")
        }
    });
    // $("#profesionales").on('change',function(){    
    //     obtenerConsultorios();    
    // }); 
}
