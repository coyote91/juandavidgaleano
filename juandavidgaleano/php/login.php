<?php

include '../bd/conexion.php';
session_start();

if(isset($_POST['btnenviar']))
{
$usuario = $_POST['nombre'];
$clave = $_POST['clave'];

$consulta = "SELECT id_usuario, nivel 
             FROM  usuarios 
             WHERE nombre = '" . $_POST["nombre"] . "' AND clave = '" . $_POST["clave"] . "'";

$query = mysql_query($consulta);
    
    if(mysql_num_rows($query) > 0) 
	{
        $arraylogin = mysql_fetch_object($query);
	
      	$_SESSION['logged'] = $arraylogin->id_usuario; 
		
		if($arraylogin->nivel == "Admin")
		{
			
			header("Location: ../php/cpadmin.php ");
			
		}
		elseif($arraylogin->nivel == "vendedor" )
		{
		
				
			header("Location: ../php/vendedor.php ");
	
		}
    }
	
		
	else {
		
		header("Location: ../index.php ");
	}




}


?>