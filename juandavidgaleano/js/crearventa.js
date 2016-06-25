function crearventa()
{
	var httr = new XMLHttpRequest();
	var url = "../sys/crearventa.php";
	var nombre = document.getElementById("nombre").value;
	var cedula = document.getElementById("cedula").value;
	var idarticulo = document.getElementById("artic").value;
	var nombrearticulo = document.getElementById("articulo").value;
   var direccion = document.getElementById("direccion").value;
    
   var  variables = "nombre="+nombre+"&cedula="+cedula+"&id_articulo="+idarticulo+"&nombrearticulo="+nombrearticulo+"&direccionenvio="+direccion;
   httr.open("POST",url,true);
   httr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   httr.onreadystatechange = function()
   {
   	 if(httr.readyState == 4  &&  httr.status == 200)
   	 { 
   	    var respuesta  = httr.responseText;
   	    document.getElementById("respuesta").innerHTML = respuesta; 	 
   	 	
   	 }
   }
  
   httr.send(variables);
   document.getElementById("respuesta").innerHTML = "procesando";
}


