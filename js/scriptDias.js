"use strict";

$(document).ready(function(){
    agregarTabla();

})

var contador=0;
function agregarTabla(){
    $("#agregar").on("click",function(){
        var dia= $("#dia").val();
        var mes=$("#mes").val();
        var ano=$("#ano").val();
        contador++;
        var boton='<button type="button" id="btn'+contador+'" class="btn boton-lista glyphicon glyphicon-remove"></button>';      
        var fila='<tr id="fila'+contador+'" class="selected text-right fila"><td>'+dia+'</td><td>'+mes+'</td><td>'+ano+'</td><td>'+boton+'</td></tr>'
        $("#tabla").append(fila);
    })
}

