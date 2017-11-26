$(document).ready(function(){
        listar_datos();
    });

    function listar_datos(){
        var tabla = $('#tablaConsultorios').DataTable({
            destroy: true,
            ajax: {
                url: '../inc/getConsultorios.php'
            },  
            columns: [
            { data: 'id_consultorio' },
            { data: 'ubicacion' },
            { defaultContent : "<button type='button' class='editar btn btn-primary' data-toggle='modal' data-target='#modalOsociales'><i class='fa fa-pencil-square-o'></i></button>	<button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalOsociales' ><i class='fa fa-trash-o'></i></button>" }
            ],
            language : idioma_espanol
            });
        // editar_registro('#tablaOsociales tbody',tabla);
        // eliminar_registro('#tablaOsociales tbody',tabla);
    };

// var guardar_datos = function(){
//     $("#nuevo-consultorio").on("submit", function(e){
//         e.preventDefault();
//         var frm = $(this).serialize();
//         console.log(frm);
//     })};

// var editar_datos = function(tbody, tabla){
//     $(tbody).on("click", "button.editar", function(){
//         var data = tabla.row($(this).parents("tr")).data();
//         console.log(data.id_consultorio);
//         console.log(data.ubicacion);
//         var consultorio = $("#nConsultorio").val(data.id_consultorio),
//         ubicacion = $("#selUbicacion").val(data.ubicacion);
//     });
// };
// var eliminar_datos = function(tbody, tabla){
//     $(tbody).on("click", "button.editar", function(){
//         var data = tabla.row($(this).parents("tr")).data();
//         console.log(data);
//     });
// };

// function __ajax(url,data){ //funcion general para enviar o traer datos
//     var ajax = $.ajax({
//         "method":"POST",
//         "url":url,
//         "data":data
//     })
//     return ajax;
// };
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