<?php 
include'../bd/conexion.php';
 include ('../php/avatar.php');
if(!isset($_SESSION['contador']) )
{
	$_SESSION['contador'] = 0 ;
	
}



?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	
	<link rel="stylesheet" href="../css/cpusuario.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
	<link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
	<link rel="stylesheet" href="../css/carrito.css" type="text/css" media="screen" title="no title" charset="utf-8" />
	
<script src="../js/windowlogin.js"> </script>
<script src="../js/creararticulo.js"></script>

<script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>	
<script src="../js/carrito.js" type="text/javascript" charset="utf-8"></script>
	

<style type="text/css">

*{margin:0px}

#searchbox
{
  width:250px;
  border:solid 1px #000;
  padding:3px;
  position:absolute;
  margin:40px 0px 0px 460px;
}

#display
{
  width:249px;
  display:none;
  margin-right:30px;
  border-left:solid 1px #dedede;
  border-right:solid 1px #dedede;
  border-bottom:solid 1px #dedede;
  overflow:hidden;
    position:absolute;
  margin:63px 0px 0px 460px;
  z-index: 9999;
}

.display_box
{
  padding:4px;
  border-top:solid 1px #dedede;
  font-size:12px;
  height:50px;

}

.display_box:hover
{
  background:#3b5998;
  color:#FFFFFF;
}

</style>

</head>
<body>
	
	
	
<?php	
	
	 include'../php/barra.php';
	
 $vista = @$_GET['view'];
$borrar = @$_GET['id'];
$idcategoria = @$_GET['idcat'];
$idproducto = @$_GET['idproducto'];                       
    ?>

 <div id="contglobal" class="clearfix">
<div id="contmenu">
		<ul id="listamenu">
			
	         <li>
				
				<div id="clientes">
					
					<center>
						<h3>Clientes</h3>
					</center>
				  
				  <br />
				  
				    <center>
				<?php echo '<a href="?view=crearusuario">Crear / </a>'; ?>
			    <?php echo '<a href="?view=verusr">Consultar  </a>'; ?>
				   </center>
				
				</div>
			</li>
		
			<li>
				
				<div id="articulos">
					
					<center>
						<h3>Articulos</h3>
					</center>
				  
				  <br />
				  
				    <center>
				
				
				<?php echo '<a href="?view=creararticulo">Crear / </a>'; ?>
				<?php echo '<a href="?view=verarticulos">Consultar </a>'; ?>
				
				 </center>
				
				</div>
				
				
			</li>
			
			<li>
				
				<div id="comprar">
					
					<center>
						<h3>Compras</h3>
					</center>
				  
				  <br />
				  
				    <center>
				
				
				<?php echo '<a href="?view=categorias">Comprar </a>'; ?>
				
				 </center>
				
				</div>
				
				
			</li>
			
			
		</ul>
		
		</div>
	 
	 <br />
	 <br />
	 <br />
	
	<?php 
	
switch ($vista) {
	
	case 'crearusuario':
    
     ?>
      <div class="continfo">
          <center>  
            Nombre:
            <input type="text" name="nombre" id="nombre"/>
            <br />
            <br />
            Apellido:
            <input type="text" name="apellido" id="apellido"/>
            <br />
            <br />
            Cedula:
            <input type="text" name="cedula" id="cedula"/>
            <br />
            <br />
            Correo:
            <input type="text" name="correo" id="correo"/>
            <br />

            <br />
            Direccion:
            <input type="text" name="direccion" id="direccion"/>
            <br />

            <br />
            Telefono:
            <input type="text" name="telefono" id="telefono"/>
            <br />

            <br />
            
           <input type="submit" name="btnenviar"  value="Crear Usuario" onclick="crearusuarios();"/>
      
        
        <div id="respuesta"></div>
        
      
      </center>
    
    </div>
     
     <?php   
        
        break;
	
case 'verusr':
	  
	    $consulta = "
                    SELECT *
                    FROM clientes
                    ";
          $query = mysql_query($consulta);
          
		  ?>
		     <div class="continfo">
        	<center>
         <table border="1" WIDTH="700">
           <tr>
                <td>Id del cliente</td> 
               <td>Nombre  </td> 
               <td>Apellido </td>
               <td> Cedula </td>
               <td>Correo </td>
               <td>Direccion</td>
               <td>Telefono</td>
               <td>Editar estado del usuario</td>
               <td>Modificar</td>
                  
           </tr>  
		  <?php
          
        
          
          while ($array = mysql_fetch_object($query)) {
          
		  
		  
         ?>
         
          
           <tr>
               <td><?php echo $us = $array->id_usuario;?></td>
               <td><?php echo $array->nombre; ?> </td>
               <td><?php echo $array->apellido;?></td>
               <td><?php echo $array->cedula;?></td>   
               <td><?php echo $array->correo;?></td>
               <td><?php echo $array->direccion;?></td>
               <td><?php echo $array->telefono;?></td>
               <td>
               	<?php
                
                if ($array->estado == "habilitado") 
                 {
                   	    	
						   	
						    echo "<a href='?view=inhabilitar&id=".$us."'>Inhabilitar </a> ";
						   	
			     }
			     else{
					  
					        echo "<a href='?view=habilitar&id=".$us."'>Habilitar </a> ";
					     
				}
						
			    ?>
               
           </td>
               	
             <td>
             	    <?php 
             	        
             	         echo "<a href='?view=modificar&id=".$us."'>Modificar </a> ";
             	       
             	  ?> 
             </td>  	
               	
      
               
          </tr>  
 
         <?php
       
          }
		  ?>
		        
	  	  
	  </table>
	 
	    </center>
	    </div>
		 
	  	<?php
	  	  break;
	  
	  	case 'habilitar':
			     
				   $sqluno = "UPDATE clientes SET estado = 'habilitado' WHERE id_usuario= '".$id."'";
				  $quno = mysql_query($sqluno);
				  if (!$quno) 
				  {
					  
					  echo "error al habilitar el campo";
					    
				  }
				 	
				break;
				
		case 'inhabilitar':
				 	
					
                  $sql = "UPDATE clientes SET estado = 'inhabilitado' WHERE id_usuario= '".$id."'";
				  $q = mysql_query($sql);
				  if (!$q) 
				  {
					  
					  echo "error al inhabilitar el campo";
					    
				  }
					
				break;
			
	   case 'modificar':
    

	
	  $consulta = "
                    SELECT *
                    FROM clientes
                    WHERE id_usuario = $id
					
                    ";
          $query = mysql_query($consulta);
         
		  while ($array = mysql_fetch_array($query)) {
         	
              $us = $array['id_usuario'];
              $nombrecliente =  $array['nombre']; 
              $apellidocliente = $array['apellido'];
              $cedulacliente  = $array['cedula'];   
              $correocliente = $array['correo'];
              $direccioncliente = $array['direccion'];
			  $telefonocliente = $array['telefono'];
          
		  }
     ?>
    <div class="continfo">
          <center>  
          	
          	<input type="hidden"  value="<?php echo $us; ?>" id="idusuario"/>
          	
            Nombre:
            <input type="text" name="nombre" id="nombre" value="<?php  echo $nombrecliente; ?>"/>
            <br />
            <br />
            Apellido:
            <input type="text" name="apellido" id="apellido" value="<?php  echo $apellidocliente; ?>"/>
            <br />
            <br />
            Cedula:
            <input type="text" name="cedula" id="cedula" value="<?php  echo $cedulacliente; ?>"/>
            <br />
            <br />
            Correo:
            <input type="text" name="correo" id="correo" value="<?php  echo $correocliente; ?>"/>
            <br />

            <br />
            Direccion:
            <input type="text" name="direccion" id="direccion" value="<?php  echo $direccioncliente; ?>"/>
            <br />

            <br />
            Telefono:
            <input type="text" name="telefono" id="telefono" value="<?php  echo $telefonocliente; ?>"/>
            <br />

            <br />
            
           <input type="submit" name="btnenviar"  value="Crear Usuario" onclick="updateusuarios();"/>
      
        
        <div id="respuesta"></div>
        
      
      </center>
    
    </div>
     
     <?php   
        
        break;
	
		case 'creararticulo':
    
     ?>
         <div class="continfo">
          <center>  
          	
          	<form action="" >
          	
            Articulo:
            <input type="text" name="articulo" id="articulo"/>
            <br />
            <br />
            Fabrica:
            <input type="text" name="fabrica" id="fabrica"/>
            <br />
            <br />
            Existencia:
            <input type="text" name="existencia" id="existencia"/>
            <br />
            <br />
            Precio:
            <input type="text" name="precio" id="precio"/>
            <br />
            <br />
            Descripcion:
            
            <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
             <br />

            <br />
            <?php 
            
            $consulta = "
                    SELECT *
                    FROM categorias
                    ";
          $query = mysql_query($consulta);
          ?>
		   Categoria:
		   
           <select name="categoria" id="categoria">
               <optgroup label="Categoria">
       
           
           <?php 
           
          while ($array = mysql_fetch_object($query)) 
          {
       ?>
       
        <option value="<?php echo $array->id_categoria; ?>"> <?php echo $array->nombre; ?> </option>
              
		<?php 	  
	      }
	    ?>
	         
              
              </optgroup>
           </select>
            
            <br />
            <br />
            
                     
           <input type="submit" name="btnenviar"  value="Crear Articulo" onclick="creararticulo();"/>
      </form>
        
        <div id="respuesta"></div>
     
      <br />
      <br />
      <br />
      
<form action="../sys/carga_archivos.php" enctype="multipart/form-data" method="post" >
      
      
      <label for="foto">Subir foto del articulo </label><br /><br />
<input type="file" name="foto" />
<br />
<br />
<input type="submit" value="Upload" />

<!---   -->

</form>
      
         </div>

      
      </center>
    
     
     <?php   
        
        break;
		
		 case 'verarticulos':
	  
	    $consulta = "
                    SELECT *
                    FROM articulos
                    ";
          $query = mysql_query($consulta);
          
		  ?>
		    <div class="continfo">
         <table border="1" width="700">
           <tr>
                <td>Id del Articulo </td> 
               <td>Nombre articulo  </td> 
               <td>Fabrica</td>
               <td>Existencia </td>
               <td>Descripcion</td>
               <td>Eliminar</td>
                  
           </tr> 
		  <?php
		  
          while ($array = mysql_fetch_object($query)) {
         ?>
          
           <tr>
               <td><?php echo $array->id_articulo;?></td>
               <td><?php echo $array->articulo; ?> </td>
               <td><?php echo $array->fabrica;?></td>
               <td><?php echo $array->existencia;?></td>   
               <td><?php echo $array->descripcion;?></td>
               <td><?php echo "<a href='?view=borrararticulo&id=".$array->id_articulo."'>Eliminar </a> ";?></td>
               
          </tr>  
         
         <?php
       
          }
	  ?>
	  
	  </table>
         </div>
	  
	  <?php
	  break;
	  
	   case 'borrararticulo' : 

    
    $consultadelete ="DELETE 
                      FROM articulos
                      WHERE id_articulo = '".$borrar."'
                       ";
    
    $querydelete = mysql_query($consultadelete);
    if(!$querydelete)
     {
         echo "No se pudo borrar el dato";
     }
  
   
   
   
                        break;
						
	   case 'categorias':				
		   ?>
						<div class="continfo">
             
              <center>Lista categorias </center>
	
    <?php
	           $consulta = " SELECT * 
	                         FROM categorias
	                      ";
	
              	$query = mysql_query($consulta);
	
	
	          	while($array = mysql_fetch_object($query))
	           {
	    	    ?>
	    	         <div class="cajacategoria">
	    	            <center> 
	    	    <?php	
		           echo '<a href="?idcat='.$array->id_categoria.'&view=listarproductos ">';
		         ?>
			           			           
			         <?php  
			           if( !empty($array->imagen) )
			           {
			 ?>
			            <div class="productimage">
			            <img class = "imgcategoria" SRC=../IMG/categorias/<?php echo $array->imagen ?> >  
	  	                </div>
	  		         <?php
	  	            	}
			          
					   echo $array->nombre.'</a><br />';
			          
			          ?>     
			          
			         
			           
			           </center>

			      
			      </div>
			      
			<?php
	           }
			   
			   ?>
			     </div>
			   <?php
			   
	     break;
	     
     case 'listarproductos':
	 ?>
						<div class="continfo">
             
              <center><h3>Lista de productos</h3> </center>
	
    <?php
	

	  
	$consultaproducto = " SELECT * 
	              FROM productos
	              WHERE id_categoria = '".$idcategoria."'
	                ";
	
	$queryproducto = mysql_query($consultaproducto);
	

	while($arrayproducto = mysql_fetch_object($queryproducto))
	{
	    		
		?>
		
		  <div class="cajaproducto">
	    	            <center> 
	    	    <?php	
		          echo '<a href="?idproducto='.$arrayproducto->id_producto.'&view=detalleproductos ">';
		         ?>
			           			           
			         <?php  
			           if( !empty($arrayproducto->imagen) )
			           {
			 ?>
			            <div class="productimage">
			            <img  SRC=../IMG/productos/<?php echo $arrayproducto->imagen ?> >  
	  	                </div>
	  		         <?php
	  	            	}
			          
				
					   echo $arrayproducto->nombre.'</a><br /><br />
					   
					   ';
		            
			          ?>     
			             <span class="precio">
			             	
			             	 Precio = $<?php    echo $arrayproducto->precio;   
			                                                        ?>
			             </span>  
			         
			           
			           </center>

			      
			      </div>
		
			   
		<?php
	}
	
	  ?>
			     </div>
			   <?php
	  
	  
	  
	  break;
	     
      case 'detalleproductos':
	 ?>
						<div class="continfo">
             
            
    <?php
	
	
	$consultapdct = " SELECT * 
	              FROM productos
	              WHERE id_producto = '".$idproducto."'
	                ";
	
	$querypdct = mysql_query($consultapdct);
	

	while($arraypdct = mysql_fetch_object($querypdct))
	{
	 
		
		?>
		
		
	    	         
	    	    <?php
	    	 
	    	    	
		          echo '<a href="?idcat='.$arraypdct->id_categoria.'&view=listarproductos ">';
		         ?>
			          
			          <div id="cntdetalleimagen"> 			           
			           <center>
			           <?php 
			          
			          
			           if( !empty($arraypdct->imagen) )
			           {
			 ?>
			            <div class="productimage">
			            <img  SRC=../IMG/productos/<?php echo $arraypdct->imagen ?> >  
	  	                </div>
	  		         <?php
	  	            	}
			          ?>
			          </center>
			          </div>
			          
			          
				<?php 
					  echo '</a>';
		?>
		             <div id="cntdetalleproducto">
		             	<center>
			          
			            <h1>Detalle del producto </h1> <br />
	  
	          
	               <h3 class="nombreproducto">
			       <?php
		       
		       	    
  echo '<a href="?idcat='.$arraypdct->id_categoria.'&view=listarproductos "> '.$arraypdct->nombre.'</a> <br /><br />';
			       
				   ?>
				   </h3>
				   
				    <span class="precio">
				    	
				     Precio $ =	<?php  echo $arraypdct->precio;  ?>
				    	
				    </span>
			          
			          <br /> <br />
			        
			           
		               <?php 
		               
		               echo $arraypdct->descripcion .'<br /><br />
		               <br />
		               <br />
		               ';
					  ?> 
			          
  <button value='<?php echo $arraypdct->id_producto ?> ' class="botoncompra"  > Añadir </button>
			               
			          </center>
			         </div>
			  

			 
	<?php		
	
       
	}
	  ?>
			     
			      <div id="contglobalcarrito">
     	<div id="titulocarrito">
     	   <h2>carrito de compras </h2>
     	   <br />
     	</div>
     	
           <center>
           	  <span>Cantidad /</span>
           	 <span>Producto  /</span>
           	 <span>Precio   / </span>
           	 <span>Borrar </span>
           </center>
     	
     	<div id="carrito">
	
	    </div>
           
           <center><a href="../sistema/vaciarcarrito.php">Vaciar Carrito</a></center>
           
     </div>
			     
			     </div>
			     
			       
			   <?php
	  
	  
	  
	  
	  break;
		        
		default:
			
			break;
	}
	
	
	?>
	
		</div>  <!-- CIERRA CONTENEDOR PARA CLEARFIX   ->
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</body>
	</html>