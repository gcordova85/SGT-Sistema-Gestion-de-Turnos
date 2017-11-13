$(document).ready(function(){
        listarPaciente();
        
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
    $('#tableDias').DataTable({
        ajax: {
            url: '../inc/getdias.php'
          },
          columns: [
            { data: 'id_dia'},
            { data: 'nombre' },
            {defaultContent:'<button class="btn btn-success btn-asignar glyphicon glyphicon-plus">Asignar</button>'},
          ]
        });
}