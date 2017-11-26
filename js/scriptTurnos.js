$(document).ready(function(){
    listarPaciente();    
});



function listarPaciente(){
    $('#tablePacienteTurno').DataTable({
        ajax:{
            type : 'POST',
            url  : '../inc/getPaciente.php'
            },
            columns: [
                { data: 'id_paciente'},
                { data: 'nombre' },
                { data: 'apellido' },
                { data: 'dni' },
                {defaultContent:'<button class="btn btn-success btn-asignar glyphicon glyphicon-plus" onClick="obtenerID();"></button>'}
            ],
            language: idioma_espanol
        });
};
function obtenerID(){
    var table = $('#tablePacienteTurno').DataTable();    
    $('#tablePacienteTurno tbody').on( 'click', 'button', function () {
        var fila = table.row( $(this).parents('tr') ).data();
        var id = fila.id_paciente;
        $.redirect( "asignarTurno.php", { 'id': id} );
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
}