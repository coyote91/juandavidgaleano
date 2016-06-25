<?php
include '../bd/conexion.php';

  $numarticulo = $_POST['numarticulo'];
  $articulo = $_POST['articulo'];
  $cantarticulo = $_POST['cantarticulo'];
  $idcliente = $_POST['idcliente'];
  $nombre = $_POST['nombre'];  
  $cedula = $_POST['cedula'];
  $correo = $_POST['correo'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];

$consulta = " INSERT INTO pedidos(articulo, numarticulo, cantarticulo,  id_cliente, nombre, correo, direccion, telefono) 
              VALUES('".$articulo."', '".$numarticulo."','".$cantarticulo."', '".$idcliente."','".$nombre."','".$correo."','".$direccion."','".$telefono."')  ";

$q = mysql_query($consulta);
if($q)
{
echo "Se ha creado el pedido";
}
else {
    echo "hay un problema con la insercion";
}
?>