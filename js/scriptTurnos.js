$(document).ready(function(){
        listarPaciente();

    });



function listarPaciente(){
    $('#tablePacienteTurno').DataTable({
        ajax: {
            url: '../inc/getPaciente.php'
          },
          columns: [

            { data: 'nombre' },
			{ data: 'apellido' },
            { data: 'dni' },
            {defaultContent:'<a href="../mod/asignarTurno.php"><button class="btn btn-success btn-asignar glyphicon glyphicon-plus">Asignar</button></a>'},
          ]
        });
}