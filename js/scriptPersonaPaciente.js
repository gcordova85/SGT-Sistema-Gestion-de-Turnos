"use strict";

$(document).ready(function(){ 
    guardar();  
    listar();  
    
});


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


function editarRegistros(tabla) {        
    $('#tablaPersonas tbody').on( 'click', 'a.btn-editar', function () { //cuando hace click en el botón que tiene la clase btn-edirar
        var data=tabla.row($(this).parents("tr")).data();
        var id=data.id_personaCargo;


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
                $("#idPers").text(persona.data[0].id_personaCargo);
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
            {data:'nombre'},
            {data:'apellido'},
            {data:'dni'},
            {data:'direccion'},
            {data:'telefono'},
            {defaultContent:'<a href="#cargo" class="btn btn-warning btn-tabla btn-editar glyphicon glyphicon-edit" data-toggle="modal"></a>'} //aparecerá en todas las filas
           
        ],

      //  "columnDefs": [ { "targets": [ 0 ], "visible": false, "searchable": false }], //oculto la columna id

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
}


function __ajax(url,data){ //funcion general para enviar o traer datos
    var ajax = $.ajax({
        "method":"POST",
        "url":url,
         

        "data":data

    })
    return ajax;
}

function datos(){   // obtengo los datos contenidos en los input
      var nombre =$("#nombrePersona").val();
      var apellido =$("#apellidoPersona").val();
      var dni =$("#dniPersona").val();
      var direccion =$("#direccionPersona").val();
      var telefono =$("#telPersona").val();
      
        var data=[]; //creo un json con los datos
        data.push(  
            {"nombre":nombre,"apellido":apellido,"dni":dni,"direccion":direccion,"telefono":telefono},
            
        );
        var personas={"data":data}; //creo un array con la clave data
        return personas; 
}

function guardar(){  //al enviar el formulario
    $("#frmModal").on("submit",function(){
    var json= JSON.stringify(datos()); //convierto el array de objetos en una cadena json
    console.log(json);
    __ajax("../inc/setPersonaCargo.php",{"json":json}) //espera respuesta en formato json y le paso mis datos
    /*.done(function(info) {
        if(info){//si hay respuesta

            //listar();

        }else{
            
        }
    })*/
})
}



//*****************ajax*********************


