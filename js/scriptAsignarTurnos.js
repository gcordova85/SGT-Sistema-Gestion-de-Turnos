$(document).ready(function(){
    $('#tablaHorarios').DataTable({
        columnDefs: [
            {
                targets: [ 0 ],
                visible: false,
                searchable: false,
            }],
        language: idioma_espanol
    });
    obtenerPaciente();  
    obtenerEspecialidades();
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
            $('#consultorios').empty();   
            $option= $("<option></option>");
            $option.attr("value",'');
            $option.text('Seleccione una opcion');
            $('#profesionales').append($option);

            $.each(result, function () {
               $option= $("<option></option>");
               $option.attr("value",this.id_profesional);
               $option.text(this.nombre +" "+ this.apellido);
               $('#profesionales').append($option);
            }); 
            obtenerConsultorios();
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
        type: "GET",
        url: "../inc/getConsultoriosByProfesional.php",
        contentType: "application/json; charset=utf-8",
        data:  {
            "idProfesional":idProfesional,
        },
        dataType: "json",
        success: function (result) {
            $('#consultorios').empty(); 
            $('#dias').empty();   
            $option= $("<option></option>");
            $option.attr("value",'');
            $option.text('Seleccione una opcion');
            $('#consultorios').append($option);

            $.each(result, function () {
                $("#idConsultorio").val(this.id_consultorio);
                $("#ubicacionConsultorio").val(this.ubicacion );
            }); 
            obtenerDiasDisponibles();
        },
        error: function (xhr, status, error) {
            alert("ERROR")
        }
    });
    
}
function obtenerDiasDisponibles() {
    var idProfesional=$("#profesionales").val();
    var idConsultorio =   $("#idConsultorio").val();
    var ubicacionConsultorio =   $("#ubicacionConsultorio").val();
    $.ajax({
        type: "GET",
        url: "../inc/getDiasByProfesional.php",
        contentType: "application/json; charset=utf-8",
        data:  {
            "idProfesional":idProfesional,
            "idConsultorio":idConsultorio,
        },
        dataType: "json",
        success: function (result) {
            $('#dias').empty();   
            $option= $("<option></option>");
            $option.attr("value",'');
            $option.text('Seleccione una opcion');
            $('#dias').append($option);            

            $.each(result, function () {
                $option= $("<option></option>");
                $option.attr("value",this.id_dia);
                $option.text(this.nombre);
                $('#dias').append($option);
            }); 
        },
        error: function (xhr, status, error) {
            alert("ERROR")
        }
    });
    $("#dias").on('change',function(){
        obtenerHoraByDia();    
    }); 
}
function obtenerHoraByDia(){
    var idPDC         = 1;
    var idProfesional =   $("#profesionales").val();
    var idConsultorio =   $("#idConsultorio").val();
    var idDia         =   $("#dias").val();
    $ajax:({
        type : 'POST',
        url  :"../inc/getPdcByDatos.php",
        data : {
            "idProfesional":idProfesional,
            "idDia": idDia,
            "idConsultorio":idConsultorio
        },
        success: function(result){
            $.each(result, function () {
                $idPDC = this.id_pdc;
             })
        },
        error: function (xhr, status, error) {
            alert("ERROR")
        }
    });
    $('#tablaHorarios').DataTable({
        destroy: true,
        ajax: {
            url: '../inc/getHoras.php',
            data:{
                "idPDC": idPDC,
            }
          },
          columns: [
            { data: 'id_horario'},
            { data: 'hora' },
            {defaultContent:'<button name="btnHora" class="btn btn-success btn-asignar" id="btnHora">Aceptar</button>'},
          ],
          columnDefs: [
            {
                targets: [ 0 ],
                visible: false,
                searchable: false,
            }],
          languaje: idioma_espanol
        }); 
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
                $option.attr("value",'');
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