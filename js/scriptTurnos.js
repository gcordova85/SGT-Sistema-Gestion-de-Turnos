$(document).ready(function(){
        listarPaciente();
        listarDias();
        listarHorarios();
        
    });



function listarPaciente(){
    $('#tablePacienteTurno').DataTable({
        ajax: {
            url: '../inc/getPaciente.php'
          },
          columns: [
            { data: 'Id_paciente'},
            { data: 'nombre' },
			{ data: 'apellido' },
            { data: 'dni' },
            {defaultContent:'<a href="asignarTurno.php"><button class="btn btn-success btn-asignar glyphicon glyphicon-plus" onClick="obtenerID();">Asignar</button></a>'},
          ]
        });
}
function obtenerID(){
    var table = $('#tablePacienteTurno').DataTable();    
    $('#tablePacienteTurno tbody').on( 'click', 'button', function () {
        var fila = table.row( $(this).parents('tr') ).data();
        var id = fila.Id_paciente;
        alert(id + "id");
        $.ajax({ 
            data : {
                "id":id,
            },
            type : 'POST',
            url  : 'asignarTurno.php',

        });
    });
};

function listarDias(){
    $('#tablaDias').DataTable({
        ajax: {
            url: '../inc/getDias.php'
          },
          columns: [
            { data: 'Id_dia'},
            { data: 'nombre' },
            {defaultContent:'<button id="btnSelHora" name="btnSelHora" class="btn btn-success" data-toggle="modal" data-target="#modalAsignar"><span class="glyphicon glyphicon-plus"></span>Seleccionar horario </button>'},
          ]
        });
}
function listarHorarios(){
    $('#tablaHorarios').DataTable({
        ajax: {
            url: '../inc/getHoras.php'
          },
          columns: [
            { data: 'Id_horario'},
            { data: 'hora' },
            {defaultContent:'<button class="btn btn-success btn-asignar glyphicon glyphicon-plus">Agregar</button>'},
          ]
        }); 
}