$(document).ready(function(){
        listar_datos();
        boton_nuevo();
        guardar_datos();
    });

var listar_datos = function(){
    var tabla = $('#tablaProfesionales').DataTable({
        destroy: true,
        ajax: {
            url: '../inc/getProfesionales.php'
          },
            columns: [
            { data: 'id_profesional' },
            { data: 'nombres' },
            { data: 'apellido' },
            { data: 'telefono' },
            { data: 'direccion' },
            { data: 'email' },
            { data: 'id_especialidad' },
            { defaultContent : "<button type='button' class='editar btn btn-primary' data-toggle='modal' data-target='#modalProfesionales'><i class='fa fa-pencil-square-o'></i></button>	<button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fa fa-trash-o'></i></button>" }
          ],
            language : idioma_espanol
    });
    editar_datos("#tablaProfesionales tbody",tabla);
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

function guardar_datos(){
    $("#nuevoProfesional").on("submit", function(e){
        e.preventDefault();
        var idprofesional = $("#nProfesional").val(),
        nombre = $("#nombreProfesional").val(),
        apellido = $("#apellidoProfesional").val(),
        tel = $("#telefonoProfesional").val(),
        dire = $("#direccionProfesional").val(),
        mail = $("#emailProfesional").val(),
        especialidad = $("#selEspecialidad").val()

        $.ajax({
                method: "POST",
                url: "../inc/setProfesionales.php",
                data: {'nombres':nombre,
                'apellido':apellido,
                'telefono':tel,
                'direccion':dire,
                'email':mail,
                'id_especialidad':especialidad},
            }).done(function(info){
                console.log("hola",info);
            });
        });
};
var editar_datos = function(tbody, tabla){
    $(tbody).on("click", "button.editar", function(){
        $("#titulo-modal").text("Editar Profesional");
        var data = tabla.row($(this).parents("tr")).data();
        var idprofesional = $("#nProfesional").val(data.id_profesional),
            nombre = $("#nombreProfesional").val(data.nombres),
            apellido = $("#apellidoProfesional").val(data.apellido),
            tel = $("#telefonoProfesional").val(data.telefono),
            dire = $("#direccionProfesional").val(data.direccion),
            mail = $("#emailProfesional").val(data.email),
            especialidad = $("#selEspecialidad").val(data.id_especialidad)
    });
};
var boton_nuevo = function(){
    $("#botonNuevo").on("click", function(){
        var form = $("#nuevoProfesional")[0].reset();
        $("#titulo-modal").text("Agregar Profesional");
    });
};
function eliminar_datos(tbody, tabla){
    $(tbody).on("click", "button.eliminar", function(){
        var data = tabla.row($(this).parents("tr")).data();
        var json = [{'id_profesional': data.id_profesional}]
    });
};
