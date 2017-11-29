"use strict";

$(document).ready(function(){ 
    //guardar();  
    listar();  
    nuevaPersona(); 
    comprobarForm();  
    ocultarMsjError();
    removerErroresTodos();
    
    
});

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
        }


/**funcion para validar DNI */
function esValidoDni(valor,texto,div){
    if (isNaN(valor) || valor.length < 8 || valor.length > 8) {
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
}

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
}


function comprobarForm() {
    $("#guardarPersona").on("click",function(){
        validarCampos();
        
    })
    $("#cambiosPersona").on("click",function(){
        validarCampos();
            
        
    })
}

function removerErroresTodos(){ //remueve todos los mensajes de errores al cancelar la edicion
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


function validarCampos(){
    var enviar = false;
    if (
        esValidoNomApe($("#nombrePersona").val(),$("#errorNombrePersona"),$("#divNombrePersona"))       
        &&
        esValidoNomApe($("#apellidoPersona").val(),$("#errorApellidoPersona"),$("#divApellidoPersona"))
        && 
        esValidoDni($("#dniPersona").val(),$("#errorDni"),$("#divDniPersona"))
         && 
        esValidaDireccion($("#direccionPersona").val(),$("#errorDireccionPersona"),$("#divDireccionPersona"))
         && 
        esValidoTel($("#telPersona").val(),$("#errorTelPersona"),$("#divTelPersona"))
    ){
        // $("#frmModal").submit(function () {
        //     return true;            
        // });    
     }else{
        // $("#frmModal").submit(function () {
        //     return false;            
        // });         
    }
    
}

function ocultarMsjError(){ //remueve el mensaje al posicionarse en el campo, solo los mensajes sin remover el error del div
    $("#nombrePersona").on("click",function() {
        $("#errorNombrePersona").fadeOut(700); 
    })
        
    $("#apellidoPersona").on("click",function() {
        $("#errorApelidoPersona").fadeOut(700); 
    })
 
    $("#dniPersona").on("click",function() {
        $("#errorDniPersona").fadeOut(700); 
    })

    $("#direccionPersona").on("click",function() {
        $("#errorDireccionPersona").fadeOut(700); 
    })

    $("#telPersona").on("click",function() {
        $("#errorTelPersona").fadeOut(700); 
    })
              
}



function alternarBotones(editar){
    var btnGuardar=$("#guardarPersona");
    var btnCambios=("#cambiosPersona") 
    $(btnCambios).addClass("disabled");
    
    if (editar) {
        $(btnCambios).removeClass("oculto");
        $(btnCambios).addClass("visible");
        $(btnGuardar).removeClass("visible");
        $(btnGuardar).addClass("oculto");
    }else{
        $(btnCambios).removeClass("visible");
        $(btnCambios).addClass("oculto");
        $(btnGuardar).removeClass("ocuto");
        $(btnGuardar).addClass("visible");
    }
    $("#frmModal").on("keyup",function(){
        $(btnCambios).removeClass("disabled");
    })
         
    
}

function seleccionarFilas(tabla){ //selecciona las filas al hacer click
    $('#tablaPersonas tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('info')) {
            $(this).removeClass('info');
        }
        else {
            tabla.$('tr.info').removeClass('info');
            $(this).addClass('info');
        }
    } );
}

function eliminarRegistros(tabla){
    $('#tablaPersonas tbody').on( 'click', 'a.btn-eliminar', function () { 
        var data=tabla.row($(this).parents("tr")).data();
        var id=data.id_personaCargo;
        $("#eliminarPersona").on("click",function() {      
             bajaPersona("../inc/bajaPersonaCargo.php",id);
             tabla.ajax.reload();
        })
})
}

function editarRegistros(tabla) {        
    $('#tablaPersonas tbody').on( 'click', 'a.btn-editar', function () { //cuando hace click en el botón que tiene la clase btn-edirar
        var data=tabla.row($(this).parents("tr")).data();
        var id=data.id_personaCargo;

        actualizarDatos("../inc/updatePersonaCargo.php",id);

        

        alternarBotones(true);
        

        var data=[]; //creo un json con los datos
        data.push(  
            {"id":id},
        );
        var datos={"data":data};
        var json= JSON.stringify(datos); //convierto el array de objetos en una cadena json
        __ajax("../inc/getPersonaCargoId.php",{"json":json})

        .done(function(info) {
            if(info){//si hay respuesta
               // console.log(info);
                 var persona=JSON.parse(info);
                 $("#nombrePersona").val(persona.data[0].nombre);
                 $("#apellidoPersona").val(persona.data[0].apellido);
                 $("#dniPersona").val(persona.data[0].dni);
                 $("#direccionPersona").val(persona.data[0].direccion);
                 $("#telPersona").val(persona.data[0].telefono);
                  

        //         console.log(persona.data[0].nombre);
                
    
             }});
        
    })


}


function listar(){ //carga los registros en el datatable
    var tabla=$('#tablaPersonas').DataTable({
        ajax:{
            url:'../inc/getPersonaCargo.php'
        },
        lengthMenu : [ [5, 10, 30, -1], [5, 10, 30, "Todos"] ], //modifica las opciones de la cantidad de registros a mostrar
        columns:[  //obtengo los valores enviados por json y los pongo en las columnas
            {data:"id_personaCargo"},
            {data:'persona'},
            {data:'dni'},
            {data:'direccion'},
            {data:'telefono'},
            {data:'estado'},
            {defaultContent:'<a href="#cargo" class="btn btn-warning btn-tabla btn-editar glyphicon glyphicon-edit" data-toggle="modal"></a><a href="#modalEliminar" class="btn-tabla btn-eliminar btn btn-danger glyphicon glyphicon-remove" data-toggle="modal" ></i></a>'} //aparecerá en todas las filas
           
        ],
        columnDefs:[
            {targets: [ 0 ],
            visible: false,
            searchable: false},
            {targets: [ 5 ],
            visible: false,
            searchable: true}
            ],


        language : idioma_espanol        
    });

    
    var idioma_espanol = { //cambio de idioma
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
    editarRegistros(tabla);
    seleccionarFilas(tabla);
    eliminarRegistros(tabla);

    
    tabla.columns(5).search("1").draw();                          
    

    $("#inactivos").on("change",function(){
        if( $(this).is(':checked') ) {
            tabla.columns(5).search("0").draw();                          
        }else{
            tabla.columns(5).search("1").draw();                                      
        }
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

function datos(id){   // obtengo los datos contenidos en los input
      var nombre =$("#nombrePersona").val();
      var apellido =$("#apellidoPersona").val();
      var dni =$("#dniPersona").val();
      var direccion =$("#direccionPersona").val();
      var telefono =$("#telPersona").val();
      var estado = "1";
      
        var data=[]; //creo un json con los datos
        data.push(  
            {id_personaCargo:id,"nombre":nombre,"apellido":apellido,"dni":dni,"direccion":direccion,"telefono":telefono,"estado":estado},
            
        );
        var personas={"data":data}; //creo un array con la clave data
        return personas; 
}

function guardarDatos(url){  //al enviar el formulario
    if(url != ""){  
        
    $("#frmModal").on("submit",function(){
    var json= JSON.stringify(datos("")); //convierto el array de objetos en una cadena json
    console.log(json);
    __ajax(url,{"json":json}) //espera respuesta en formato json y le paso mis datos
     .done(function(info) {
         if(info){//si hay respuesta
             console.log(info)
    //         //listar();
         }
    //     }else{
    //         console.log("algo fue mal");
            
    //     }
     })
})
}
}

function actualizarDatos(url,id){
    if(url != ""){  
    $("#frmModal").on("submit",function(){
    var json= JSON.stringify(datos(id)); 
    console.log(json);
    __ajax(url,{"json":json}) 
     .done(function(info) {
    //     if(info){//si hay respuesta
    //         console.log(info)
    //         //listar();
    console.log(info);

         //}else{
    //         console.log("algo fue mal");
            
    //     }
     })
})
}
}



function nuevaPersona(){
    $("#btnCargo").on("click",function(){
        $('#frmModal').trigger("reset"); 
        guardarDatos("../inc/setPersonaCargo.php");
        alternarBotones(false);
           
    })
    
}


function bajaPersona(url,id) {
        
        var data=[]; //creo un json con los datos
        data.push(  
            {"id":id},
        );
        var datos={"data":data};
        var json= JSON.stringify(datos); //convierto el array de objetos en una cadena json
        __ajax(url,{"json":json})

         .done(function(info) {
        //     if(info){//si hay respuesta
                 console.log(info);
    
            // }
            });
        
    
}

//*****************ajax*********************


