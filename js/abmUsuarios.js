$(document).ready(function(){
        listar_datos();
        boton_nuevo();
        validarCamposNuevo();
        validarCamposEditar();
        confirmarEliminar();
        removerErroresTodos();
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
            { defaultContent : "<button type='button' class='editar btn btn-xs btn-warning' data-toggle='modal' data-target='#modalUsuarios'><i class='fa fa-pencil'></i></button>	<button type='button' class='eliminar btn btn-xs btn-danger' data-toggle='modal' data-target='#modalUsuarios' ><i class='fa fa-times'></i></button>" }
            ],
            columnDefs: [
                {   targets: [ 0,2],
                    visible: false,
                    searchable: false}
                ],
            language : idioma_espanol
            });
        editar_registro('#tablaUsuarios tbody',tabla);
        eliminar_registro('#tablaUsuarios tbody',tabla);
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
function boton_nuevo(){
    $("#botonNuevo").on("click", function(){
        var b1=$("#agregarNuevo");
        var b2=$("#guardarCambios");
        var b3=$("#eliminarUsuario");
        var divForm=$("#div-formulario");
        var divDel=$("#div-eliminar");
        alternar_botones(b1,b2,b3);
        alternar_divs(divForm,divDel);
        $("#nuevoUsuario")[0].reset();
        $("#titulo-modal").text("Agregar Nuevo Usuario");
    });
};
function guardar_datos(urlPHP,datos){
    $("#nuevoUsuario").on("submit", function(){
        $.ajax({
                method: "POST",
                url: urlPHP,
                data: datos,
            }).done(function(info){
                console.log("hola",info);
            });
        });
};
function editar_registro(tbody, tabla){
    var b1=$("#agregarNuevo");
    var b2=$("#guardarCambios");
    var b3=$("#eliminarUsuario");
    var divForm=$("#div-formulario");
    var divDel=$("#div-eliminar");
    $(tbody).on("click", "button.editar", function(){
        alternar_campos(false);
        alternar_botones(b2,b1,b3);
        alternar_divs(divForm,divDel);
        $("#nuevoUsuario")[0].reset();
        $("#titulo-modal").text("Editar Usuario");
        var data = tabla.row($(this).parents("tr")).data();
        $("#nUsuario").val(data.id_usuario);
        $("#nombreUsuario").val(data.usuario);
        $("#passUsuario").val(data.clave);
        $("#selTipoUsuario").val(data.tipo_usuario);

    });
};
function eliminar_registro(tbody, tabla){
    $(tbody).on("click", "button.eliminar", function(){
        var b1=$("#agregarNuevo");
        var b2=$("#guardarCambios");
        var b3=$("#eliminarUsuario");
        var divForm=$("#div-formulario");
        var divDel=$("#div-eliminar");
        var data = tabla.row($(this).parents("tr")).data();
        $("#nuevoUsuario")[0].reset();
        $("#titulo-modal").text("Eliminar Usuario");
        alternar_botones(b3,b1,b2);
        if(divDel.hasClass("oculto")){
            divDel.removeClass("oculto")
        }
        $("#nUsuario").val(data.id_usuario);
        $("#nombreUsuario").val(data.usuario);
        $("#passUsuario").val(data.clave);
        $("#selTipoUsuario").val(data.tipo_usuario);
        alternar_campos(true);
    });
};
function alternar_botones(boton1,boton2,boton3){
    if (boton1.hasClass("oculto")){
        boton1.removeClass("oculto")
    }
    if(!boton2.hasClass("oculto")){
        boton2.addClass("oculto")
    }
    if(!boton3.hasClass("oculto")){
        boton3.addClass("oculto")
    }
};
function alternar_divs(div1,div2){
    if (div1.hasClass("oculto")){
        div1.removeClass("oculto")
    }
    if (!div2.hasClass("oculto")){
        div2.addClass("oculto")
    }
};
function esValidoSelect(valor,texto,div) {
    if (valor == "") {
        texto.fadeIn(700);
        div.addClass("has-error");
        return false;
    }else{           
        if (div.hasClass("has-error")) {
            div.removeClass("has-error");       
        }  
        texto.fadeOut(700); 
        return true;            
        } 
    
};
function esValidoUsername(valor,texto,div) {
    var filtro=/([A-Za-zñáéíóú]{3,})\s*(([A-Za-zñáéíóú]{3,})){0,1}$/;
        if (filtro.test(valor) == false) {
            texto.fadeIn(700);
            div.addClass("has-error");
            return false;
        }else{           
            if (div.hasClass("has-error")) {
                div.removeClass("has-error");       
            }  
            //texto.fadeOut(700); 
            return true;            
            }                    
};
function esValidoPass(valor,texto,div) {
    var filtro=/[a-zA-Z0-9]{8,}/;
        if (filtro.test(valor) == false) {
            texto.fadeIn(700);
            div.addClass("has-error");
            return false;
        }else{           
            if (div.hasClass("has-error")) {
                div.removeClass("has-error");       
            }  
            //texto.fadeOut(700); 
            return true;            
            }                    
};
function alternar_campos(valor){
    $("#nUsuario").prop("disabled", valor);
    $("#nombreUsuario").prop("disabled", valor);
    $("#passUsuario").prop("disabled", valor);
    $("#selTipoUsuario").prop("disabled", valor);
}
function validarCamposNuevo(){
    $("#agregarNuevo").on("click",function(){
        esValidoUsername($("#nombreUsuario").val(),$("#errorNom"),$("#div-nombreUsuario"));
        // esValidoPass($("#passUsuario").val(),$("#errorPass"),$("#div-passUsuario"));
        esValidoSelect($("#selTipoUsuario").val(),$("#errorTipoUsuario"),$("#div-TipoUsuario"));  
        var url = '../inc/setUsuario.php',
        id_usuario = $("#nUsuario").val(),
        usuario = $("#nombreUsuario").val(),
        clave = $("#passUsuario").val(),
        tipo_usuario = $("#selTipoUsuario").val(),
        estado = 1
        var data={'id_usuario':id_usuario,
                    'usuario':usuario,
                    'clave':clave,
                    'tipo_usuario':tipo_usuario,
                    'estado':estado};
        guardar_datos(url,data);
    })      
};
function validarCamposEditar(){
    $("#guardarCambios").on("click",function(){
        esValidoUsername($("#nombreUsuario").val(),$("#errorNom"),$("#div-nombreUsuario"));
        // esValidoPass($("#passUsuario").val(),$("#errorPass"),$("#div-passUsuario"));
        esValidoSelect($("#selTipoUsuario").val(),$("#errorTipoUsuario"),$("#div-TipoUsuario"));  
        var url = '../inc/updateUsuario.php',
        id_usuario = $("#nUsuario").val(),
        usuario = $("#nombreUsuario").val(),
        clave = $("#passUsuario").val(),
        tipo_usuario = $("#selTipoUsuario").val(),
        estado = 1
        var data={'id_usuario':id_usuario,
                    'usuario':usuario,
                    'clave':clave,
                    'tipo_usuario':tipo_usuario,
                    'estado':estado};
        guardar_datos(url,data);
    })    
};
function confirmarEliminar(){
    $("#eliminarUsuario").on("click", function(){
        var id_usuario = $("#nUsuario").val();
        var url = '../inc/deleteUsuario.php',
            data={'id_usuario':id_usuario}
        guardar_datos(url,data)
    })
}
function removerErroresTodos(){
    $("#btnCancelar").on("click",function() {
        $(".divInput").each(function() {
            if($(this).hasClass("has-error")){
                $(this).removeClass("has-error");
            }
        })
        $(".divError").each(function(){
            $(this).fadeOut(700);
        })
    })
}

