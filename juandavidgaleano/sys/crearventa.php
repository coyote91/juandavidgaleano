<?php
include '../bd/conexion.php';

  $nombre = $_POST['nombre'];
  $cedula = $_POST['cedula'];
  $idarticulo = $_POST['id_articulo'];
  $nombrearticulo = $_POST['nombrearticulo'];
  $direccionenvio = $_POST['direccionenvio'];

$consulta = " INSERT INTO ventas(nombre, cedula,  idarticulo, nombrearticulo, direccionenvio) 
              VALUES('".$nombre."', '".$cedula."', '".$idarticulo."','".$nombrearticulo."','".$direccionenvio."')  ";

$q = mysql_query($consulta);
if($q)
{
echo "Se ha creado la venta";
}
else {
    echo "hay un problema con la insercion";
}
?>