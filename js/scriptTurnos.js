$(document).ready(function(){
        listarPaciente();        
    });



function listarPaciente(){
    $.ajax({
        type : 'POST',
        url  : '../inc/getPaciente.php',
        data : null,
        success :  function(response){         
            if(response != "error"){
                $('#tablePacienteTurno').DataTable({
                    columns: [
                      { data: 'id_paciente'},
                      { data: 'nombre' },
                      { data: 'apellido' },
                      { data: 'dni' },
                      {defaultContent:'<button class="btn btn-success btn-asignar glyphicon glyphicon-plus" onClick="obtenerID();">Asignar</button>'},
                    ]
                  }) 
            }
            else{
                $('#tablePacienteTurno').DataTable();
            };
        },
    });
}
function obtenerID(){
    var table = $('#tablePacienteTurno').DataTable();    
    $('#tablePacienteTurno tbody').on( 'click', 'button', function () {
        var fila = table.row( $(this).parents('tr') ).data();
        var id = fila.id_paciente;
        alert(id + "id");
        $.redirect( "asignarTurno.php", { 'id': id} );
        
       // window.location.assign("asignarTurno.php?id=" + id) ;
    });
    
};

