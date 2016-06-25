<?php
/**
* @Project ferreteria
* @copyright (c) 2016
* @author Juan David Galeano <juhack88@hotmail.com>
* @license GNU-GPL  http://www.gnu.org/licenses/ http://es.wikipedia.org/wiki/GNU_General_Public_License
* @since Version 1.0
*/

$localhost = "localhost";
$usuario = "root";
$clave = "";
$db ="ferreteria";

$conexion = mysql_connect($localhost, $usuario, $clave);
$db = mysql_select_db($db);


if(!$conexion)
{
	
	echo "Hay un problema con la conexion ";
}


if(!$db)
{
	echo "Hay un error con la base de datos";
	
}




?>