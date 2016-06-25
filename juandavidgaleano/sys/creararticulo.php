<?php
include '../bd/conexion.php';

  $articulo = $_POST['articulo'];
  $fabrica = $_POST['fabrica'];
  $existencia = $_POST['existencia'];
  $descripcion = $_POST['descripcion'];
  $categoria = $_POST['categoria'];
  $precio = $_POST['precio'];
  


$consulta = " INSERT INTO productos(nombre,descripcion,precio,id_categoria,existencia,fabrica) 
              VALUES('".$articulo."', '".$descripcion."', '".$precio."','".$categoria."','".$existencia."','".$fabrica."')  ";

$q = mysql_query($consulta);
if($q)
{
echo "Se ha creado el articulo";
}
else {
    echo "hay un problema con la insercion";
}
?>






