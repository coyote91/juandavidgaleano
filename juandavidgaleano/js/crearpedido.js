function crearpedido()
{
	var httr = new XMLHttpRequest();
	var url = "../sys/crearpedido.php";
	var numarticulo = document.getElementById("numarticulo").value;
	var articulo = document.getElementById("articulo").value;
	var cantarticulo = document.getElementById("cantarticulo").value;
	var idcliente = document.getElementById("idcliente").value;
    var nombre = document.getElementById("nombre").value;
    var correo = document.getElementById("correo").value;
    var direccion = document.getElementById("direccion").value;
    var telefono = document.getElementById("telefono").value;
    
    
   var  variables = "numarticulo="+numarticulo+"&articulo="+articulo+"&cantarticulo="+cantarticulo+"&idcliente="+idcliente+"&nombre="+nombre+"&correo="+correo+"&direccion="+direccion+"&telefono="+telefono;
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


