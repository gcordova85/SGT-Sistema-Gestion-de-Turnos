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