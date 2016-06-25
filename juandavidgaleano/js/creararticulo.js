function creararticulo()
{
	var httr = new XMLHttpRequest();
	var url = "../sys/creararticulo.php";
	var articulo = document.getElementById("articulo").value;
	var fabrica = document.getElementById("fabrica").value;
	var existencia = document.getElementById("existencia").value;
	var descripcion = document.getElementById("descripcion").value;
	var precio = document.getElementById("precio").value;
    var categoria = document.getElementById("categoria").value;
    
    
   var  variables = "articulo="+articulo+"&fabrica="+fabrica+"&existencia="+existencia+"&descripcion="+descripcion+"&categoria="+categoria+"&precio="+precio;
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


