<?php
include('../bd/conexion.php');
session_start();   
  
  $suma = 0;
   
 if( isset($_GET['p']) )
  {
     $_SESSION['producto'][$_SESSION['contador']] = $_GET['p']; 
     $_SESSION['contador']++;
  }

  
  
   if($_SESSION['contador'] == 0 )
   {
      echo '<br /><br /><p class="carritovacio" >El carrito está vacío</p> ';
   }
   else {
    
   	echo "<table>";	 
   for ($i=0; $i <$_SESSION['contador']; $i++) 
   {
       //echo "producto: ".$_SESSION['producto'][$i]. "<br />";  
   
      $consulta = "SELECT * FROM productos WHERE id_producto = ".$_SESSION['producto'][$i]. " ";
      $queryconsulta = mysql_query($consulta);
	  while($arrayconsulta = mysql_fetch_object($queryconsulta))
	  {
	  	   	
	  	 echo '<tr><td>'.$arrayconsulta->nombre . '</td><td> '. $arrayconsulta->precio .'</td> 
	  	 <td> <button value='.$i. ' class="botonborrar" > Borrar </button> </td></tr>';
	    
		$suma += $arrayconsulta->precio;
		
	  }
   }
     echo "<tr><td>Subtotal</td> <td>".number_format($suma , 3)."</td></tr>";
     echo "</table>";	
   }
   
   
   
   mysql_close($conexion);


   
?>
