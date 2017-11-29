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
                            url: '../inc/getTurnosHOY.php',
                            data:null,
                          },
                          columns: [
                            { data: 'nombre'},
                           { data: 'apellido' },
                           { data: 'fecha' },
                           { data: 'profesional' },
                           { data: 'consultorio' },
                           { data: 'hora' },
                           { data: 'dia' },
                          ],
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
