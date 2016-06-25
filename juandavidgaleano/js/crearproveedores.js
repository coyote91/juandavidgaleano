function crearproveedor()
{
	var httr = new XMLHttpRequest();
	var url = "../sys/crearproveedores.php";
	var nombreproveedor = document.getElementById("nombreproveedor").value;
	var telefono = document.getElementById("telefono").value;
	var direccion = document.getElementById("direccion").value;
	var correo = document.getElementById("correo").value;

    
   var  variables = "nombreproveedor="+nombreproveedor+"&telefono="+telefono+"&direccion="+direccion+"&correo="+correo;
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

