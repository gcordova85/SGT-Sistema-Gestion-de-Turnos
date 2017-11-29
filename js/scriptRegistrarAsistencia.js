$(document).ready(function(){
        listar_datos();
        
    });

    function listar_datos(){
        var tabla = $('#tablaTurnos').DataTable({
            destroy: true,
            ajax: {
                url: '../inc/getTurnosRegistroAsistencia.php'
            },  
            columns: [
            {data: 'id'},
            { data: 'paciente' },
            { data: 'profesional' },
            { data: 'consultorio' },
            { data: 'fecha' },
            { data: 'hora' },  
            { defaultContent : "<button type='button' class='btn btn-success btn-asistio btn-xs glyphicon glyphicon-ok'>Asistió</button>" }
            ],
            columnDefs:[
                {targets: [ 2 ],
                visible: false,
                searchable: false},
                ],
            language : idioma_espanol
            });
            asistio(tabla);
};

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


function asistio(tabla){
    $('#tablaTurnos tbody').on( 'click', 'button.btn-asistio', function () { 
        var data=tabla.row($(this).parents("tr")).data();
        var id=data.id;
             __ajax("../inc/setAsistencia.php",{"idTurno":id})
                .done(function(info) {
                    console.log(info);
             })
             tabla.ajax.reload();
        
})
}

function __ajax(url,data){ //funcion general para enviar o traer datos
    var ajax = $.ajax({
        "method":"POST",
        "url":url,
         
        "data":data

    })
    return ajax;
}