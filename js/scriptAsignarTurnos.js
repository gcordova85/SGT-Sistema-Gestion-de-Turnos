$(document).ready(function(){
    listarDias();
    listarHorarios(); 
    reservarTurnos();       
});






function datos(){   // obtengo los datos contenidos en los input
    var nombre =$("#nombre").val();
    var apellido =$("#apellido").val();
    var dni =$("#dni").val();
   
      var data=[]; //creo un json con los datos
      data.push(  
          {"nombre":nombre,"apellido":apellido,"dni":dni},
          
      );
      var personas={"data":data}; //creo un array con la clave data
      return personas; 
}
function reservarTurnos(){
    var idDia = 1
    var idHora = 1

    var tablaD = $('#tablaDias').DataTable();  
    $('#tablaDias tbody').on( 'click', 'button #btnDia', function () {
        var fila = tablaD.row( $(this).parents('tr') ).data();
         idDia = fila.id_dia;
        console.log(idDia);
    });
    var tablaH = $('#tablaHorarios').DataTable();
    $('#tablaHorarios tbody').on( 'click', 'button #btnHora', function () {
        var fila = tablaH.row( $(this).parents('tr') ).data();
         idHora = fila.id_horario;
    });

    $.ajax({
        type : 'POST',
        url  : '../inc/setReserva.php',
        data : {
                "idDia":idDia,
                "idHora"  :idHora,
        },
        success :  function(response){         
            if(response == true){
                return "ok";
                }
            else{
                    return "mal";
            };
        },
    });
    
}
function listarDias(){
    $('#tablaDias').DataTable({
        ajax: {
            url: '../inc/getDias.php'
          },
          columns: [
            { data: 'id_dia'},
            { data: 'nombre' },
            {defaultContent:'<button id="btnDia" name="btnDia" class="btn btn-success" data-toggle="modal" data-target="#modalAsignar"><span class="glyphicon glyphicon-plus"></span>Seleccionar horario </button>'},
          ]
        });
}
function listarHorarios(){
    $('#tablaHorarios').DataTable({
        ajax: {
            url: '../inc/getHoras.php'
          },
          columns: [
            { data: 'id_horario'},
            { data: 'hora' },
            {defaultContent:'<button class="btn btn-success btn-asignar glyphicon glyphicon-plus" id="btnHora">Agregar</button>'},
          ]
        }); 
}
