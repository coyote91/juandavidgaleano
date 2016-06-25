
function crearvendedor()
{
	var httr = new XMLHttpRequest();
	var url = "../sys/crearvendedor.php";
	var nombre = document.getElementById("nombre").value;
	var apellido = document.getElementById("apellido").value;
	var correo = document.getElementById("correo").value;
    var clave = document.getElementById("clave").value;
    var nivel = document.getElementById("nivel").value;
    
   var  variables = "nombre="+nombre+"&apellido="+apellido+"&correo="+correo+"&clave="+clave+"&nivel="+nivel;
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
