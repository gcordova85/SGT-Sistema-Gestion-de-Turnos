$(document).ready(function(){
        listar_datos();
        boton_nuevo();
        validarCamposNuevo();
        validarCamposEditar();
        confirmarEliminar();
        removerErroresTodos();
    });

function listar_datos(){
    var tabla = $('#tablaOsociales').DataTable({
        destroy: true,
        ajax: {
            url: '../inc/getOsociales.php'
        },  
        columns: [
        { data: 'id_obrasocial' },
        { data: 'nombre' },
        { data: 'email' },
        { data: 'telefono' },
        { defaultContent : "<button type='button' class='editar btn btn-xs btn-warning' data-toggle='modal' data-target='#modalOsociales'><i class='fa fa-pencil'></i></button>	<button type='button' class='eliminar btn btn-xs btn-danger' data-toggle='modal' data-target='#modalOsociales' ><i class='fa fa-times'></i></button>" }
        ],
        columnDefs:[
        {targets: [ 0 ],
        visible: false,
        searchable: false},
        { className: "hidden-xs", targets: [ 2,3 ] }
        ],
        language : idioma_espanol
        });
    editar_registro('#tablaOsociales tbody',tabla);
    eliminar_registro('#tablaOsociales tbody',tabla);
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
function guardar_datos(urlPHP,datos){
    $("#nuevaOsocial").on("submit", function(){
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
    var b3=$("#eliminarOsocial");
    var divForm=$("#div-formulario");
    var divDel=$("#div-eliminar");
    $(tbody).on("click", "button.editar", function(){
        alternar_campos(false);
        alternar_botones(b2,b1,b3);
        alternar_divs(divForm,divDel);
        $("#nuevaOsocial")[0].reset();
        $("#titulo-modal").text("Editar Obra Social/Prepaga");
        var data = tabla.row($(this).parents("tr")).data();
        $("#nOsocial").val(data.id_obrasocial),
        $("#nombreOsocial").val(data.nombre),
        $("#emailOsocial").val(data.email),
        $("#telefonoOsocial").val(data.telefono)
    });
};
function eliminar_registro(tbody, tabla){
    $(tbody).on("click", "button.eliminar", function(){
        var b1=$("#agregarNuevo");
        var b2=$("#guardarCambios");
        var b3=$("#eliminarOsocial");
        var divForm=$("#div-formulario");
        var divDel=$("#div-eliminar");
        var data = tabla.row($(this).parents("tr")).data();
        $("#nuevaOsocial")[0].reset();
        $("#titulo-modal").text("Eliminar Obra Social/Prepaga");
        alternar_botones(b3,b1,b2);
        if(divDel.hasClass("oculto")){
            divDel.removeClass("oculto")
        }
        $("#nOsocial").val(data.id_obrasocial),
        $("#nombreOsocial").val(data.nombre),
        $("#emailOsocial").val(data.email),
        $("#telefonoOsocial").val(data.telefono),
        alternar_campos(true);
    });
};
function esValidoNomApe(valor,texto,div) {
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
function esValidoTel(valor,texto,div){
    if (isNaN(valor) || valor.length < 11 || valor.length > 11) {
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
function esValidoMail(valor,texto,div){
    var filtro=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
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
function validarCamposNuevo(){
    $("#agregarNuevo").on("click",function(){
        esValidoNomApe($("#nombreOsocial").val(),$("#errorNom"),$("#div-nombreOsocial"));       
        esValidoTel($("#telefonoOsocial").val(),$("#errorTel"),$("#div-telfonoOsocial"));
        esValidoMail($("#emailOsocial").val(),$("#errorMail"),$("#div-emailOsocial"));
        var url = '../inc/setOsocial.php';
        var id_obrasocial = $("#nOsocial").val(),
        nombre = $("#nombreOsocial").val(),
        tel = $("#telefonoOsocial").val(),
        mail = $("#emailOsocial").val(),
        estado = 1
        var data={'id_obrasocial':id_obrasocial,
        'nombre':nombre,
        'email':mail,
        'telefono':tel,
        'estado':estado}
        guardar_datos(url,data);
    })      
};
function validarCamposEditar(){
    $("#guardarCambios").on("click",function(){
        esValidoNomApe($("#nombreOsocial").val(),$("#errorNom"),$("#div-nombreOsocial"));       
        esValidoTel($("#telefonoOsocial").val(),$("#errorTel"),$("#div-telfonoOsocial"));
        esValidoMail($("#emailOsocial").val(),$("#errorMail"),$("#div-emailOsocial"));
        var url = '../inc/updateOsocial.php';
        var id_obrasocial = $("#nOsocial").val(),
        nombre = $("#nombreOsocial").val(),
        tel = $("#telefonoOsocial").val(),
        mail = $("#emailOsocial").val(),
        especialidad = $("#selEspecialidad").val(),
        estado = 1
        var data={'id_obrasocial':id_obrasocial,
        'nombre':nombre,
        'email':mail,
        'telefono':tel,
        'estado':estado}
        guardar_datos(url,data)
    })      
};
function confirmarEliminar(){
    $("#eliminarOsocial").on("click", function(){
        var id_obrasocial = $("#nOsocial").val();
        console.log("id obra social",id_obrasocial);
        var url = '../inc/deleteOsocial.php',
            data={'id_obrasocial':id_obrasocial}
        console.log("datos para el PHP", data);
        guardar_datos(url,data)
    })
}
function boton_nuevo(){
    $("#botonNuevo").on("click", function(){
        var b1=$("#agregarNuevo");
        var b2=$("#guardarCambios");
        var b3=$("#eliminarOsocial");
        var divForm=$("#div-formulario");
        var divDel=$("#div-eliminar");
        alternar_botones(b1,b2,b3);
        alternar_divs(divForm,divDel);
        $("#nuevaOsocial")[0].reset();
        $("#titulo-modal").text("Agregar Obra Social/Prepaga");
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
function alternar_campos(valor){
    $("#nOsocial").prop("disabled", valor);
    $("#nombreOsocial").prop("disabled", valor);
    $("#telefonoOsocial").prop("disabled", valor);
    $("#emailOsocial").prop("disabled", valor);
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