<?php
include '../bd/conexion.php';

$carpeta = "../IMG/productos/";
opendir ($carpeta);

$destino = $carpeta. $_FILES ['foto'] ['name'];

copy ($_FILES ['foto'] ['tmp_name'], $destino );

echo "Archivo subido exitosamente </br>";

$nombre = $_FILES ['foto'] ['name'];

//echo "<img src=\"fotos/$nombre\"><br>";

?>
  <img  SRC=../IMG/productos/<?php echo $nombre ?> >  
<?php 

echo $_FILES ['foto']['name']. "<br>";

echo $_FILES ['foto']['size']. "bytes <br>";

echo $_FILES ['foto']['type']. "<br>";



$consulta = " INSERT INTO productos(imagen) 
              VALUES('".$destino."')  ";

$q = mysql_query($consulta);
if($q)
{
echo "Se ha insertado la url de la imagen correctamente";
}
else {
    echo "hay un problema con la insercion";
}

?>