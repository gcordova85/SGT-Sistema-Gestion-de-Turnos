$(document).ready(function(){
        listar_datos();
        // boton_nuevo();
        // validarCamposNuevo();
        // validarCamposEditar();
        // confirmarEliminar();
        // removerErroresTodos();
    });

    function listar_datos(){
        var tabla = $('#tablaUsuarios').DataTable({
            destroy: true,
            ajax: {
                url: '../inc/getUsuarios.php'
            },  
            columns: [
            { data: 'id_usuario' },
            { data: 'usuario' },
            { data: 'clave' },
            { data: 'tipo_usuario' },
            { defaultContent : "<button type='button' class='editar btn btn-xs btn-warning' data-toggle='modal' data-target='#modalConsultorios'><i class='fa fa-pencil'></i></button>	<button type='button' class='eliminar btn btn-xs btn-danger' data-toggle='modal' data-target='#modalConsultorios' ><i class='fa fa-times'></i></button>" }
            ],
            language : idioma_espanol
            });
        // editar_registro('#tablaConsultorios tbody',tabla);
        // eliminar_registro('#tablaConsultorios tbody',tabla);
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
// function boton_nuevo(){
//     $("#botonNuevo").on("click", function(){
//         var b1=$("#agregarNuevo");
//         var b2=$("#guardarCambios");
//         var b3=$("#eliminarConsultorio");
//         var divForm=$("#div-formulario");
//         var divDel=$("#div-eliminar");
//         alternar_botones(b1,b2,b3);
//         alternar_divs(divForm,divDel);
//         $("#nuevoConsultorio")[0].reset();
//         $("#titulo-modal").text("Agregar Nuevo Consultorio");
//     });
// };
// function guardar_datos(urlPHP,datos){
//     $("#nuevoConsultorio").on("submit", function(){
//         $.ajax({
//                 method: "POST",
//                 url: urlPHP,
//                 data: datos,
//             }).done(function(info){
//                 console.log("hola",info);
//             });
//         });
// };
// function editar_registro(tbody, tabla){
//     var b1=$("#agregarNuevo");
//     var b2=$("#guardarCambios");
//     var b3=$("#eliminarConsultorio");
//     var divForm=$("#div-formulario");
//     var divDel=$("#div-eliminar");
//     $(tbody).on("click", "button.editar", function(){
//         alternar_campos(false);
//         alternar_botones(b2,b1,b3);
//         alternar_divs(divForm,divDel);
//         $("#nuevoConsultorio")[0].reset();
//         $("#titulo-modal").text("Editar Consultorio");
//         var data = tabla.row($(this).parents("tr")).data();
//         $("#nConsultorio").val(data.id_consultorio);
//         $("#selUbicacion").val(data.ubicacion);
//     });
// };
// function eliminar_registro(tbody, tabla){
//     $(tbody).on("click", "button.eliminar", function(){
//         var b1=$("#agregarNuevo");
//         var b2=$("#guardarCambios");
//         var b3=$("#eliminarConsultorio");
//         var divForm=$("#div-formulario");
//         var divDel=$("#div-eliminar");
//         var data = tabla.row($(this).parents("tr")).data();
//         $("#nuevoConsultorio")[0].reset();
//         $("#titulo-modal").text("Eliminar Consultorio");
//         alternar_botones(b3,b1,b2);
//         if(divDel.hasClass("oculto")){
//             divDel.removeClass("oculto")
//         }
//         $("#nConsultorio").val(data.id_consultorio),
//         $("#selUbicacion").val(data.ubicacion),
//         alternar_campos(true);
//     });
// };
// function alternar_botones(boton1,boton2,boton3){
//     if (boton1.hasClass("oculto")){
//         boton1.removeClass("oculto")
//     }
//     if(!boton2.hasClass("oculto")){
//         boton2.addClass("oculto")
//     }
//     if(!boton3.hasClass("oculto")){
//         boton3.addClass("oculto")
//     }
// };
// function alternar_divs(div1,div2){
//     if (div1.hasClass("oculto")){
//         div1.removeClass("oculto")
//     }
//     if (!div2.hasClass("oculto")){
//         div2.addClass("oculto")
//     }
// };
// function esValidoSelect(valor,texto,div) {
//     if (valor == "") {
//         texto.fadeIn(700);
//         div.addClass("has-error");
//         return false;
//     }else{           
//         if (div.hasClass("has-error")) {
//             div.removeClass("has-error");       
//         }  
//         texto.fadeOut(700); 
//         return true;            
//         } 
    
// }
// function alternar_campos(valor){
//     $("#selUbicacion").prop("disabled", valor);
// }
// function validarCamposNuevo(){
//     $("#agregarNuevo").on("click",function(){
//         esValidoSelect($("#selUbicacion").val(),$("#errorUbicacion"),$("#div-ubicacionConsultorio"));  
//         var url = '../inc/setConsultorios.php',
//         ubicacion= $("#selUbicacion").val(),
//         estado = 1
//         var data={'ubicacion':ubicacion,
//         'estado':estado};
//         guardar_datos(url,data);
//     })      
// };
// function validarCamposEditar(){
//     $("#guardarCambios").on("click",function(){
//         esValidoSelect($("#selUbicacion").val(),$("#errorUbicacion"),$("#div-ubicacionConsultorio"));  
//         var url = '../inc/updateConsultorio.php',
//         id_consultorio = $("#nConsultorio").val(),
//         ubicacion= $("#selUbicacion").val(),
//         estado = 1
//         var data={'id_consultorio':id_consultorio,'ubicacion':ubicacion,
//         'estado':estado};
//         guardar_datos(url,data);
//     })      
// };
// function confirmarEliminar(){
//     $("#eliminarConsultorio").on("click", function(){
//         var id_consultorio = $("#nConsultorio").val();
//         var url = '../inc/deleteConsultorio.php',
//             data={'id_consultorio':id_consultorio}
//         guardar_datos(url,data)
//     })
// }
// function removerErroresTodos(){
//     $("#btnCancelar").on("click",function() {
//         $(".divInput").each(function() {
//             if($(this).hasClass("has-error")){
//                 $(this).removeClass("has-error");
//             }
//         })
//         $(".divError").each(function(){
//             $(this).fadeOut(700);
//         })
//     })
// }