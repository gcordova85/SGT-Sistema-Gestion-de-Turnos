$(document).ready(function(){
    //listarDias();
    //listarHorarios(); 
    $('#tablaHorarios').DataTable({
        language: idioma_espanol
    });
    obtenerPaciente();  
    obtenerProfesionales();
});



function obtenerPaciente() {
    var id=$("#idPaciente").val();
    var data=[]; //creo un json con los datos
    data.push(  
        {"id":id},
    );

    var datos={"data":data};
    var json= JSON.stringify(datos); //convierto el array de objetos en una cadena json
    $.ajax({
        type : 'POST',
        url  :"../inc/getPacienteId.php",
        data : {"json":json},
    })
        .done(function(info) {
             if(info){//si hay respuesta
                 var persona=JSON.parse(info);
                 $("#nombre").val(persona.data[0].nombre);
                 $("#apellido").val(persona.data[0].apellido);
                 $("#dni").val(persona.data[0].dni);
             }
        });
}

function reservarTurnos(){
    var id=$("#idPaciente").val();
    var idDia = 1
    var idHora = 1
    var tablaD = $('#tablaDias').DataTable();  
    $('#tablaDias tbody').on( 'click', 'button #btnDia', function () {
        var fila = tablaD.row( $(this).parents('tr') ).data();
         idDia = fila.id_dia;
        console.log(idDia);
    });
    var tablaH = $('#tablaHorarios').DataTable();
    $('#tablaHorarios tbody').on( 'click', 'button #btnHora', function () {
        var fila = tablaH.row( $(this).parents('tr') ).data();
         idHora = fila.id_horario;
    });
    var idProfesional = $("#profesionales").val();
    var idConsultorio = $("#profesionales").val();

    $.ajax({
        type : 'POST',
        url  : '../inc/setReserva.php',
        data : {
                "idDia":idDia,
                "idHora"  :idHora,
                "idProfesional" : idProfesional,
                "idConsultorio" : idConsultorio,
                "idPaciente" : idPaciente
        },
        success :  function(response){         
            if(response == true){
                return "ok";
                }
            else{
                    return "mal";
            };
        },
    });
    
}
function listarDias(){
    $('#tablaDias').DataTable({
        ajax: {
            url: '../inc/getDias.php'
          },
          columns: [
            { data: 'id_dia'},
            { data: 'nombre' },
            {defaultContent:'<button id="btnDia" name="btnDia" class="btn btn-default" data-toggle="modal" data-target="#modalAsignar"><span class="glyphicon glyphicon-plus"></span>Seleccionar horario </button>'},
          ]
        });
}
function listarHorarios(){
    $('#tablaHorarios').DataTable({
        ajax: {
            url: '../inc/getHoras.php'
          },
          columns: [
            { data: 'id_horario'},
            { data: 'hora' },
            {defaultContent:'<button name="btnHora" class="btn btn-success btn-asignar glyphicon glyphicon-plus" id="btnHora" onClick="reservarTurnos();">Agregar</button>'},
          ],
          languaje: idioma_espanol
        }); 
}
function obtenerProfesionales() {
    $.ajax({
        type: "POST",
        url: "../inc/getProfesional.php",
        contentType: "application/json; charset=utf-8",
        data: null,
        dataType: "json",
        success: function (result) {
            $.each(result, function () {
               $option= $("<option></option>");
               $option.attr("value",this.id_profesional);
               $option.text(this.nombre +" "+ this.apellido);
               $('#profesionales').append($option);
            }); 
        },
        error: function (xhr, status, error) {
            alert("ERROR")
        }
    });
    $("#profesionales").on('change',function(){    
        obtenerConsultorios();    
    }); 
}
function obtenerConsultorios() {
    var idProfesional=$("#profesionales").val();
    $.ajax({
        type: "POST",
        url: "../inc/getConsultorios.php",
        contentType: "application/json; charset=utf-8",
        data:  {
            "idProfesional":idProfesional,
        },
        dataType: "json",
        success: function (result) {
            $.each(result, function () {
               $('#consultorio').attr("value",this.id_consultorio + " " + this.ubicacion);
            }); 
        },
        error: function (xhr, status, error) {
            alert("ERROR")
        }
    });
}
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
1	
function noVolver(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="noVolver";}
}