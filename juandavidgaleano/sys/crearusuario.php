<?php
include '../bd/conexion.php';

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $cedula = $_POST['cedula'];
  $correo = $_POST['correo'];
 $direccion = $_POST['direccion'];
 $telefono = $_POST['telefono'];
 $estado = "habilitado";
 
$consulta = " INSERT INTO clientes(nombre, apellido, cedula, correo, direccion, telefono,estado) 
              VALUES('".$nombre."', '".$apellido."', '".$cedula."','".$correo."','".$direccion."','".$telefono."','".$estado."')  ";

$q = mysql_query($consulta);
if($q)
{
echo "Se ha creado el usuario ".$nombre;
}
else {
    echo "hay un problema con la insercion";
}
?>