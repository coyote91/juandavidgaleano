<?php

 
include'../bd/conexion.php';
 include ('../php/avatar.php');


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	
	<link rel="stylesheet" href="../css/cpusuario.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
	<link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
	
<script src="../js/windowlogin.js"> </script>
<script src="../js/crearusuarios.js"></script>
<script src="../js/crearventa.js"></script>
<script src="../js/updateusuarios.js"></script>
<script src="../js/crearusuariovendedor.js"></script>
<script src="../js/creararticulo.js"></script>
<script src="../js/crearpedido.js"></script>
<script src="../js/crearproveedores.js"></script>
</head>
<body>
	
	<div id="box1">
		<div class="triangulo"></div>
		
		<h2>Caja1</h2>
		
		<?php 
		
		if(isset($_SESSION['logged']))
		{
			 echo'<a href="../php/logout.php" id="optlogout">Cerrar Sesion</a>'; 
		}else
		{
			 header('Location: ../index.php'); 
		} 
		
		?>
		
		
	</div>
	
	<header id="contenedorglobalheader" class="clearfix">
	
	  <div id="titlecpanel">
	   <h2>Administrador</h2>
	  </div>
	
		
		<div id="contaccountbar">
			
			
			<div id="cntnotificaciones">
				
				<div id="cnticononotificacion"></div>
				
			</div>
		 
		 
		    <div id="myaccount">
		    	
		   	<?php Elusuario::avatar(); ?>
		    	
		    </div>
			
			
		</div>
		
		 	
		
		
	</header>
	
	
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
				
				<div id="usuarios">
					
					<center>
						<h3>Usuarios</h3>
					</center>
				  
				  <br />
				  
				    <center>
				    <?php echo '<a href="?view=crearusuariovendedor">Crear / </a>'; ?>
				    <?php echo '<a href="?view=vervendedores">Consultar </a>'; ?>
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
				
				<div id="proveedores">
					
					<center>
						<h3>Proveedores</h3>
					</center>
				  
				  <br />
				  
				    <center>
				
				
				<?php echo '<a href="?view=crearproveedores">Crear / </a>'; ?>
				<?php echo '<a href="?view=verproveedores"> Consultar </a>'; ?>
				
				  </center>
				
				</div>
				
				
			</li>
			
			
			
			<li>
				
				<div id="pedidos">
					
					<center>
						<h3>Pedidos</h3>
					</center>
				  
				  <br />
				  
				    <center>
				
				<?php echo '<a href="?view=crearpedidoproveedor">Crear / </a>'; ?>
			    <?php echo '<a href="?view=verpedidoproveedor">Consultar </a>'; ?>
				
				  </center>
				
				</div>
				
			</li>
			
			<li>
				
				<div id="venta">
					
					<center>
						<h3>Ventas</h3>
					</center>
				  
				  <br />
				  
				    <center>
				
				<?php echo '<a href="?view=crearventa">Crear / </a>'; ?>
			    <?php echo '<a href="?view=verventa">Consultar </a>'; ?>
				
				  </center>
				
				</div>
				
			</li>
		</ul>
		
		</div>
		
	
		
    <br />
    <br />
	
	
	<?php

$vista = @$_GET['view'];
$borrar = @$_GET['id'];

$id = @$_GET['id'];
$nivel = @$_POST['nivel'];


$data = array( 
               'view'  => @$_GET['view'],
             
               );




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
	    
	  
	  case 'borrarconsulta' : 

    
    $consultadelete ="DELETE 
                      FROM clientes
                      WHERE id_usuario = '".$borrar."'
                       ";
    
    $querydelete = mysql_query($consultadelete);
    if(!$querydelete)
     {
         echo "No se pudo borrar el dato";
     }
  
   
   
   
                        break;
	
	
	  case 'crearusuariovendedor' :
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
          
            Correo:
            <input type="text" name="correo" id="correo"/>
            <br />
            
            <br />
            
            Clave:
            <input type="password" name="clave" id="clave"/>
           <br /> 
           <br />
           Nivel usuario:
           <select name="nivel" id="nivel">
               <optgroup label="Nivel Usuario">
               <option value="vendedor">Vendedor</option>
              
              </optgroup>
           </select>
           <br /><br />
           <input type="submit" name="btnenviar"  value="Crear Vendedor" onclick="crearvendedor();"/>
      
        
        <div id="respuesta"></div>
        
      
      </center>
      </div>
	  
	  <?php
	  
	  break;
	
	   
case 'vervendedores' : 
	
	   ?> 
              <div class="continfo">
              	
              	<center>
              	
               <center>
                 <h3>Vendedores</h3>
    
         Nivel usuario:
          <form action="../php/cpadmin.php?view=vervendedores"  method="post" >
              
               <select name="nivelp" id="nivelp">
               <optgroup label="Nivel Usuario">
               <option value="vendedor">Vendedor</option>
          
              </optgroup>
           </select>
           <br /><br />
           
           <input type="submit" name="Enviar" value="Enviar" />
           
          </form>

         </center>
      <br />
 
  <?php
  
 
        $nivel = @$_POST['nivelp'];
   
         
          switch ($nivel) {
              case 'vendedor':
                     
                     $consulta = "
                    SELECT *
                    FROM usuarios
                    WHERE nivel = '".$nivel."'
                
                    ";
          $query = mysql_query($consulta);
          
          while ($array = mysql_fetch_object($query)) {
         ?>
         <table border="1">
           <tr>
                <td>Id del cliente</td> 
               <td>Nombre  </td> 
               <td>Apellido </td>
               <td>Correo </td>
               <td>Eliminar</td>
                  
           </tr>    
           <tr>
               <td><?php echo $array->id_usuario;?></td>
               <td><?php echo $array->nombre; ?> </td>
               <td><?php echo $array->apellido;?></td>   
               <td><?php echo $array->correo;?></td>
               <td><?php echo "<a href='?view=borrarvendedor&id=".$array->id_usuario."'>Eliminar </a> ";?></td>
               
          </tr>  
         </table>
         
        
         <?php
       
          }
       ?>
       </center>
          </div>
	<?php
	break;
	
		default:
			
			break;
	}
	
	
	 case 'borrarvendedor' : 

    
    $consultadelete ="DELETE 
                      FROM usuarios
                      WHERE id_usuario = '".$borrar."'
                       ";
    
    $querydelete = mysql_query($consultadelete);
    if(!$querydelete)
     {
         echo "No se pudo borrar el dato";
     }
  
   
   
   
                        break;
	
	 case 'creararticulo':
    
     ?>
          <div class="continfo">
          <center>  
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
            Descripcion:
            <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
            <br />

            <br />
            
          
            
           <input type="submit" name="btnenviar"  value="Crear Articulo" onclick="creararticulo();"/>
      
        
        <div id="respuesta"></div>
        
      
      </center>
    
     </div>
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
         <table border="1" WIDTH="600">
        
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
						
		 case 'crearproveedores':
	  
	    ?>
	    <div class="continfo">
	  <center>  
            Nombre proveedor:
            <input type="text" name="nombreproveedor" id="nombreproveedor"/>
            <br />
            <br />
            Telefono:
            <input type="text" name="telefono" id="telefono"/>
            <br />
            <br />
             Direccion:
            <input type="text" name="direccion" id="direccion"/>
            <br />
            <br />
            Correo:
            <input type="text" name="correo" id="correo"/>
            <br />
            
            <br />

           <input type="submit" name="btnenviar"  value="Crear proveedor" onclick="crearproveedor();"/>
      
        
        <div id="respuesta"></div>
        
      
      </center>
      </div>
	  
	  <?php
	  
	  break;
	  				
		 case 'verproveedores':
	  
	    $consulta = "
                    SELECT *
                    FROM proveedores
                    ";
          $query = mysql_query($consulta);
          ?>
          
          <div class="continfo">
         <table border="1" WIDTH="700" >
           <tr>
                <td>Id del Proveedor </td> 
               <td>Nombre Proveedor  </td> 
               <td>Telefono</td>
               <td>Direccion </td>
               <td>Correo</td>
               <td>Eliminar</td>
                  
           </tr>    
           
          <?php
          while ($array = mysql_fetch_object($query)) {
         ?>
         
           <tr>
               <td><?php echo $array->id_proveedor;?></td>
               <td><?php echo $array->proveedor; ?> </td>
               <td><?php echo $array->telefono;?></td>
               <td><?php echo $array->direccion;?></td>   
               <td><?php echo $array->correo;?></td>
               <td><?php echo "<a href='?view=borrarproveedor&id=".$array->id_proveedor."'>Eliminar </a> ";?></td>
               
          </tr>  
         
         <?php
       
          }
	  ?>
	  </table>
         </div>
	  
<?php	  
	  break;				
				
	 case 'borrarproveedor' : 

    
    $consultadelete ="DELETE 
                      FROM proveedores
                      WHERE id_proveedor = '".$borrar."'
                       ";
    
    $querydelete = mysql_query($consultadelete);
    if(!$querydelete)
     {
         echo "No se pudo borrar el dato";
     }
  
   
   
   
                        break;			
						
	 case 'crearpedidoproveedor' :
		 	
			    ?>
			   <div class="continfo"> 
			   
			   <center>
			    <h3>Crear Pedido</h3>
			   <br />
			   
	
           <br />
           <br />
			   
			   <center>
			    <h3>Lista de Proveedores </h3>
			   </center>
			    
			   <br />
			   <table border="1" width="700">
         
			         <tr>
                <td>Id del Proveedor</td> 
               <td>Proveedor </td> 
               <td>Telefono</td>
               <td>Direccion</td>
               <td>Correo</td>
               <td>Crear pedido </td>
                  
           </tr> 
           
			    <?php
	  	     $consulta = "
                    SELECT *
                    FROM proveedores
                  
                    ";
          $query = mysql_query($consulta);
          
          while ($array = mysql_fetch_object($query)) {
         ?>
         
           <tr>
               <td><?php echo $idproveedor = $array->id_proveedor;?></td>
               <td><?php echo $proveedor = $array->proveedor; ?> </td>
               <td><?php echo $telefono = $array->telefono;?></td>   
               <td><?php echo $direccion = $array->direccion;?></td>
               <td><?php echo $correo = $array->correo;?></td>
               <td><?php echo '<a href="cpadmin.php?'.http_build_query($data).'&create=createpedido&id='.$idproveedor.'">Crear Pedido </a> ';?></td>
               
          </tr>  
      
         <?php
       
          }
  
	  	   ?>
	  	      </table>
	  <center> 
	  	
	  	  <?php
	  	  
	  	  $create = @$_GET['create'];
	  	  
	  	  switch ($create) {
				case 'createpedido':
					?>
					<br /><br />
					  <h1>Pedidos</h1>
	  	<br />
	  	
	  			   <form action="<?php $_SERVER['PHP_SELF']; ?> " method="POST" >
			     <select name="articulos" id="artic">
                   <optgroup label="Articulos">
                   	<?php 
                   	 $consulta = "
                    SELECT *
                    FROM articulos 
                    ";
          $query = mysql_query($consulta);
          
          while ($array = mysql_fetch_object($query)) {
          	$articulo = $array->articulo;
          	
          	?>
			  
			<option value=<?php echo $array->id_articulo; ?> ><?php echo $articulo; ?></option>
       
       <?php		
		  }
                   	?>
                     
                  </optgroup>
                </select>
                <br />
                <br />
                <input type="submit" value="Enviar" name="enviarticulo"/>
                
                </form>
              <br />
              <br />
              <br />
	  	
	  	<form action="" method="post">
	  	<!-- ../sys/crearpedido.php  --->
	  	    Numero articulo:
            <input type="text" name="numarticulo" id="numarticulo" value="<?php echo @$_POST['articulos'];  ?> " />
            <br />
            <br />
            
            Articulo: 
            
            <input type="text" name="articulo" id="articulo" value="<?php echo $articulo;  ?>"/>
	  	     <br />
            <br />
           
           Cantidad Articulo: 
           
            <input type="text" name="cantarticulo" id="cantarticulo" />
	  	     <br />
            <br />
                 
            ID cliente:
            <input type="text" name="idcliente" id="idcliente" value=" <?php echo $idproveedor; ?>"/>
            <br />
            <br />
            
            Nombre:
            <input type="text" name="nombre" id="nombre" value=" <?php echo $proveedor; ?>"/>
             <br /><br />
             Telefono:
            <input type="text" name="telefono" id="telefono" value=" <?php echo $telefono; ?>"/>
            <br />
            <br />
              Direccion:
            <input type="text" name="direccion" id="direccion" value=" <?php echo $direccion; ?>"/>
            <br />
            <br />
            Correo:
            <input type="text" name="correo" id="correo" value=" <?php echo $correo; ?>"/>
            <br />
            <br />
       

           <input type="submit" name="btnenviar"  value="Crear pedido" onclick="crearpedido();" />
          
          </form>
          
          <br />
          <br />
          <br />
          <br />
        
        <div id="respuesta"></div>
      </div>
      <?php
					
					break;
				
				default:
					
					break;
			}
	  	  
	  	  
	  	  
	  	  
	  	  
	  	  ?>
      
      </center>
      
	  
	  <?php
	  		
						
		break;	
		
		
	 case 'verpedidoproveedor' :
		 
		 ?>
			 <div class="continfo">
			<center>
				
				 <h1> Pedidos Realizados</h1>
				<?php
				              
                     $consulta = "
                    SELECT *
                    FROM pedidos
                   
                    ";
          $query = mysql_query($consulta);
          ?>
            <table border="1" width="500">
           <tr>
                <td>Id pedido</td> 
               <td>Articulo </td> 
               <td>Numero Articulo </td>
               <td>Cantidad Articulo </td>
               <td>Id cliente</td>
               <td>Nombre</td>
               <td>Apellido</td>
               <td>Cedula</td>
               <td>Correo</td>
               <td>Direccion</td>
               <td>Telefono</td>
               <td>Eliminar</td>
                  
           </tr> 
          <?php
          while ($array = mysql_fetch_object($query)) {
         ?>
          
           <tr>
               <td><?php echo $array->id_pedido;?></td>
               <td><?php echo $array->articulo; ?> </td>
               <td><?php echo $array->numarticulo;?></td>
               <td><?php echo $array->cantarticulo; ?></td>   
               <td><?php echo $array->id_cliente; ?> </td>
               <td><?php echo $array->nombre; ?></td>
               <td><?php echo $array->apellido; ?></td>
               <td><?php echo $array->cedula; ?></td>
               <td><?php echo $array->correo;?></td>
               <td><?php echo $array->direccion; ?></td>
               <td><?php echo $array->telefono; ?></td>
               <td><?php echo "<a href='?view=borrarpedido&id=".$array->id_pedido."'>Eliminar </a> ";?></td>
               
          </tr>  
         
         <?php
       
          }
 ?>
 </table>

			
				
			</center>
		 </div>
		 
		 
		 <?php
		 
		 break;
		 
		  case 'borrarpedido' : 

    
    $consultadelete ="DELETE 
                      FROM pedidos
                      WHERE id_pedido = '".$borrar."'
                       ";
    
    $querydelete = mysql_query($consultadelete);
    if(!$querydelete)
     {
         echo "No se pudo borrar el dato";
     }
  
   
   
   
                        break;	
						
						
		  case 'crearventa'	:					
			?>			
		   <div class="continfo">
			<center>
				
			  <h2>Creacion de venta </h2>
			  
			Nombre Cliente:
            <input type="text" name="nombre" id="nombre"/>
            <br />
            <br />
            
            Cedula:
            <input type="text" name="cedula" id="cedula"/>
            <br />
            <br />
            
       <form action="<?php $_SERVER['PHP_SELF']; ?> " method="POST" >
			     <select name="articulos" id="artic">
                   <optgroup label="Articulos">
                   	<?php 
                   	 $consulta = "
                    SELECT *
                    FROM articulos 
                    ";
          $query = mysql_query($consulta);
          
          while ($array = mysql_fetch_array($query)) {
          	
          	$articulo = $array['articulo'];
          	$idarticulo = $array['id_articulo'];
          	?>
			  
			<option value=<?php echo $idarticulo; ?> ><?php echo $articulo; ?></option>
       
       <?php		
		  }
                   	?>
                     
                  </optgroup>
                </select>
                <br />
                <br />
                <input type="submit" value="Enviar" name="enviarticulo"/>
                
                </form>
        
            <br />
            <br />
                        
            Nombre articulo:
            <input type="text" name="articulo" value="<?php echo $articulo; ?>"  id="articulo"/>
            <br />

            <br />
            Direccion:
            <input type="text" name="direccion" id="direccion"/>
            <br />

            <br />
            
           <input type="submit" name="btnenviar"  value="Crear venta" onclick="crearventa();"/>
      
        
        <div id="respuesta"></div>
			
							
		  </center>
		 </div>
		 
		 
					<?php 			
					break;
					
case 'verventa' : 					
					
					?>
			 <div class="continfo">
			<center>
				
				 <h1> Ventas Realizados</h1>
				 
				 <br /><br />
				 
				<?php
				              
                     $consulta = "
                    SELECT *
                    FROM ventas
                   
                    ";
          $query = mysql_query($consulta);
          ?>
            <table border="1" width="500">
           <tr>
               <td>Id venta</td> 
               <td>Nombre </td> 
               <td>Cedula</td>
               <td>Id Articulo </td>
               <td>Nombre articulo</td>
               <td>Direccion envio</td>
                  
           </tr> 
          <?php
          while ($array = mysql_fetch_object($query)) {
         ?>
          
           <tr>
               <td><?php echo $array->id_venta;?></td>
               <td><?php echo $array->nombre; ?> </td>
               <td><?php echo $array->cedula;?></td>
               <td><?php echo $array->idarticulo; ?></td>   
               <td><?php echo $array->nombrearticulo; ?> </td>
               <td><?php echo $array->direccionenvio; ?></td>
               
          </tr>  
         
         <?php
       
          }
 ?>
 </table>

			
				
			</center>
		 </div>
		 
		 
				<?php	
					
					break;
					
	
		default:
			
			break;
	}
	
	
	
	?>
	
	<!-- CIERRE CLEARFIX -->
		</div>  
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</body>
</html>	