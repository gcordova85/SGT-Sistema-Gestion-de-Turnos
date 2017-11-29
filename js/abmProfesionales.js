$(document).ready(function(){
        listar_datos();
        boton_nuevo();
        validarCamposNuevo();
        validarCamposEditar();
        confirmarEliminar();
        obtenerEspecialidades();
        removerErroresTodos();
    });

function listar_datos(){
    var tabla = $('#tablaProfesionales').DataTable({
        destroy: true,
        ajax: {url: '../inc/getProfesionales.php'},
        columns: [
            { data: 'id_profesional' },
            { data: 'nombre' },
            { data: 'apellido' },
            { data: 'telefono' },
            { data: 'direccion' },
            { data: 'email' },
            { data: 'id_especialidad'},
            { data: 'especialidad'},
            { defaultContent : "<button type='button' class='editar btn btn-xs btn-warning' data-toggle='modal' data-target='#modalProfesionales'><i class='fa fa-pencil'></i></button>	<button type='button' class='eliminar btn btn-xs btn-danger' data-toggle='modal' data-target='#modalProfesionales' ><i class='fa fa-times'></i></button>" }
            ],
        columnDefs: [
        {   targets: [ 0, 6 ],
            visible: false,
            searchable: false},
        { className: "hidden-xs block", targets: [ 3,4,5 ] }
        ],
        language : idioma_espanol
    });
    editar_registro('#tablaProfesionales tbody',tabla);
    eliminar_registro('#tablaProfesionales tbody',tabla);
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
    $("#nuevoProfesional").on("submit", function(){
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
    var b3=$("#eliminarProfesional");
    var divForm=$("#div-formulario");
    var divDel=$("#div-eliminar");
    $(tbody).on("click", "button.editar", function(){
        alternar_campos(false);
        alternar_botones(b2,b1,b3);
        alternar_divs(divForm,divDel);
        $("#nuevoProfesional")[0].reset();
        $("#titulo-modal").text("Editar Profesional");
        var data = tabla.row($(this).parents("tr")).data();
        $("#nProfesional").val(data.id_profesional),
        $("#nombreProfesional").val(data.nombre),
        $("#apellidoProfesional").val(data.apellido),
        $("#telefonoProfesional").val(data.telefono),
        $("#direccionProfesional").val(data.direccion),
        $("#emailProfesional").val(data.email),
        $("#selEspecialidad").val(data.id_especialidad)
    });
};
function eliminar_registro(tbody, tabla){
    $(tbody).on("click", "button.eliminar", function(){
        var b1=$("#agregarNuevo");
        var b2=$("#guardarCambios");
        var b3=$("#eliminarProfesional");
        var divForm=$("#div-formulario");
        var divDel=$("#div-eliminar");
        var data = tabla.row($(this).parents("tr")).data();
        $("#nuevoProfesional")[0].reset();
        $("#titulo-modal").text("Eliminar Profesional");
        alternar_botones(b3,b1,b2);
        if(divDel.hasClass("oculto")){
            divDel.removeClass("oculto")
        }
        $("#nProfesional").val(data.id_profesional),
        $("#nombreProfesional").val(data.nombre),
        $("#apellidoProfesional").val(data.apellido),
        $("#telefonoProfesional").val(data.telefono),
        $("#direccionProfesional").val(data.direccion),
        $("#emailProfesional").val(data.email),
        $("#selEspecialidad").val(data.id_especialidad)
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
function esValidaDireccion(valor,texto,div){
    if (valor.length < 10) {
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
function esValidoSelect(valor,texto,div) {
    if (valor == 0) {
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
    
}
function validarCamposNuevo(){
    $("#agregarNuevo").on("click",function(){
        esValidoNomApe($("#nombreProfesional").val(),$("#errorNom"),$("#div-nombreProfesional"));       
        esValidoNomApe($("#apellidoProfesional").val(),$("#errorApe"),$("#div-apellidoProfesional"));
        esValidoTel($("#telefonoProfesional").val(),$("#errorTel"),$("#div-telfonoProfesional"));
        esValidaDireccion($("#direccionProfesional").val(),$("#errorDir"),$("#div-direccionProfesional"));
        esValidoMail($("#emailProfesional").val(),$("#errorMail"),$("#div-emailProfesional"));
        esValidoSelect($("#selEspecialidad").val(),$("#errorEspecialidad"),$("#div-selEspecialidad"));  
        var url = '../inc/setProfesionales.php';
        var idprofesional = $("#nProfesional").val(),
        nombre = $("#nombreProfesional").val(),
        apellido = $("#apellidoProfesional").val(),
        tel = $("#telefonoProfesional").val(),
        dire = $("#direccionProfesional").val(),
        mail = $("#emailProfesional").val(),
        especialidad = $("#selEspecialidad").val(),
        estado = 1
        var data={'id_profesional':idprofesional,
        'nombre':nombre,
        'apellido':apellido,
        'telefono':tel,
        'direccion':dire,
        'email':mail,
        'id_especialidad':especialidad,
        'estado':estado};
        guardar_datos(url,data);
    })      
};
function validarCamposEditar(){
    $("#guardarCambios").on("click",function(){
        esValidoNomApe($("#nombreProfesional").val(),$("#errorNom"),$("#div-nombreProfesional"));       
        esValidoNomApe($("#apellidoProfesional").val(),$("#errorApe"),$("#div-apellidoProfesional"));
        esValidoTel($("#telefonoProfesional").val(),$("#errorTel"),$("#div-telfonoProfesional"));
        esValidaDireccion($("#direccionProfesional").val(),$("#errorDir"),$("#div-direccionProfesional"));
        esValidoMail($("#emailProfesional").val(),$("#errorMail"),$("#div-emailProfesional"));
        esValidoSelect($("#selEspecialidad").val(),$("#errorEspecialidad"),$("#div-selEspecialidad"));
        var url = '../inc/updateProfesionales.php';
        var idprofesional = $("#nProfesional").val(),
        nombre = $("#nombreProfesional").val(),
        apellido = $("#apellidoProfesional").val(),
        tel = $("#telefonoProfesional").val(),
        dire = $("#direccionProfesional").val(),
        mail = $("#emailProfesional").val(),
        especialidad = $("#selEspecialidad").val(),
        estado = 1
        var data={'id_profesional':idprofesional,
        'nombre':nombre,
        'apellido':apellido,
        'telefono':tel,
        'direccion':dire,
        'email':mail,
        'id_especialidad':especialidad,
        'estado':estado};
        guardar_datos(url,data);
    })      
};
function confirmarEliminar(){
    $("#eliminarProfesional").on("click", function(){
        var idprofesional = $("#nProfesional").val()
        var url = '../inc/deleteProfesional.php',
            data={'id_profesional':idprofesional}
        guardar_datos(url,data)
    })
}
function boton_nuevo(){
    $("#botonNuevo").on("click", function(){
        var b1=$("#agregarNuevo");
        var b2=$("#guardarCambios");
        var b3=$("#eliminarProfesional");
        var divForm=$("#div-formulario");
        var divDel=$("#div-eliminar");
        alternar_botones(b1,b2,b3);
        alternar_divs(divForm,divDel);
        $("#nuevoProfesional")[0].reset();
        $("#titulo-modal").text("Agregar Profesional");
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
    $("#nProfesional").prop("disabled", valor);
    $("#nombreProfesional").prop("disabled", valor);
    $("#apellidoProfesional").prop("disabled", valor);
    $("#telefonoProfesional").prop("disabled", valor);
    $("#direccionProfesional").prop("disabled", valor);
    $("#emailProfesional").prop("disabled", valor);
    $("#selEspecialidad").prop("disabled", valor);
}
function obtenerEspecialidades() {
    $.ajax({
        type: "POST",
        url: "../inc/getEspecialidades.php",
        contentType: "application/json; charset=utf-8",
        data: null,
        dataType: "json",
        success: function (result) {
                $option= $("<option></option>");
                $option.attr("value",'0');
                $option.text('Seleccione una opcion');
                $('#selEspecialidad').append($option);

            $.each(result, function () {
               $option= $("<option></option>");
               $option.attr("value",this.id_especialidad);
               $option.text(this.descripcion);
               $('#selEspecialidad').append($option);
            }); 
        },
        error: function (xhr, status, error) {
            alert("ERROR")
        }
})};
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