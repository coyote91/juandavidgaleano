<?php
include '../bd/conexion.php';

  $nombre = $_POST['nombreproveedor'];
  $telefono = $_POST['telefono'];
  $direccion = $_POST['direccion'];
  $correo = $_POST['correo'];

$consulta = " INSERT INTO proveedores(proveedor, telefono,  direccion, correo) 
              VALUES('".$nombre."', '".$telefono."', '".$direccion."','".$correo."')  ";

$q = mysql_query($consulta);
if($q)
{
echo "Se ha creado el proveedor";
}
else {
    echo "hay un problema con la insercion";
}
?>