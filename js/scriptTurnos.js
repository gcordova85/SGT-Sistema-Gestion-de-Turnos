$(document).ready(function(){
    $('#tablePacienteTurno').DataTable({
        ajax: {
            url: 'getPaciente.php'
          },
          columns: [
            { data: 'nombre' },
			{ data: 'apellido' },
			{ data: 'dni' },
          ]
        });
    });


