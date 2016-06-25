function updateusuarios()
{
	var httr = new XMLHttpRequest();
	var url = "../sys/updateusuarios.php";
	var idusuario = document.getElementById("idusuario").value;
	var nombre = document.getElementById("nombre").value;
	var apellido = document.getElementById("apellido").value;
	var cedula = document.getElementById("cedula").value;
	var correo = document.getElementById("correo").value;
	var direccion = document.getElementById("direccion").value;
    var telefono = document.getElementById("telefono").value;
    
   var  variables = "nombre="+nombre+"&apellido="+apellido+"&cedula="+cedula+"&correo="+correo+"&direccion="+direccion+"&telefono="+telefono+"&id_usuario="+idusuario;
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