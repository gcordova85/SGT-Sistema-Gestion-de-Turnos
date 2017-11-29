$(document).ready(function(){
    obtenerAsistencias();
});
function obtenerAsistencias() {
        $.ajax({
            type : 'POST',
            url  :"../inc/getTurnosDiario.php",
            data : null,
            success: function(response){
                if(response >=1){
                    $('#tablaReportes').DataTable({
                        destroy: true,
                        ajax: {
                            type:'POST',
                            url: '../inc/getTurnosReporte.php',
                            data:null,
                          },
                          columns: [
                            { data: 'paciente'},
                           { data: 'fecha' },
                           { data: 'profesional' },
                           { data: 'consultorio' },
                           { data: 'hora' },
                           { data: 'estado' },
                          ],
                          columnDefs : [
                            { targets : [5],
                            render : function (data, type, row) { 
                                switch(data) {
                                     case '1' : return 'Ausente'; 
                                     break; 
                                     case '2' : return 'Asistió'; 
                                     break;
                                     case '0' : return 'Cancelado'; 
                                     break; 
                                     default : return 'N/A';
                                    } 
                               } 
                           } 
                       ], 
                       language: idioma_espanol
                       
                        }); 
                }
                else{
                    $('#tablaReportes').DataTable();
                }   
    
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
    "sInfo":           "Mostrando del _START_ al _END_ de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "",
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
