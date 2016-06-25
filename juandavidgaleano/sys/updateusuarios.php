<?php
include '../bd/conexion.php';

  $id_usuario = $_POST['id_usuario'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $cedula = $_POST['cedula'];
  $correo = $_POST['correo'];
 $direccion = $_POST['direccion'];
 $telefono = $_POST['telefono'];
 $estado = "habilitado";
 
$consulta = " UPDATE clientes   
              SET nombre = '".$nombre."', apellido = '".$apellido."', cedula = '".$cedula."', correo = '".$correo."', direccion =  '".$direccion."', telefono = '".$telefono."', estado = '".$estado."' 
              WHERE id_usuario = '".$id_usuario."'
              
              ";
              
$q = mysql_query($consulta);
if($q)
{
echo "Se ha realizado un cambio con el usuario ".$nombre;
}
else {
    echo "hay un problema al actualizar el dato";
}




?>