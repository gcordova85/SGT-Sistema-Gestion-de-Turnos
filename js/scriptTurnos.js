$(document).ready(function(){
    $('#tablePacienteTurno').DataTable({
        ajax: {
            url: '../inc/getPaciente.php'
          },
          columns: [
            { data: 'nombre' },
			{ data: 'apellido' },
			{ data: 'dni' },
          ]
        });
    });


