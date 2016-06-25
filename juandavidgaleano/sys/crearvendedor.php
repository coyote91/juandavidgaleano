<?php
include '../bd/conexion.php';

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $correo = $_POST['correo'];
  $clave = $_POST['clave'];
  $nivel = $_POST['nivel'];
 
$consulta = " INSERT INTO usuarios(nombre, apellido,  correo, clave, nivel) 
              VALUES('".$nombre."', '".$apellido."', '".$correo."','".$clave."','".$nivel."')  ";

$q = mysql_query($consulta);
if($q)
{
echo "Se ha creado el usuario".$nombre;
}
else {
    echo "hay un problema con la insercion";
}
?>