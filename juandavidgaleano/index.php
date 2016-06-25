
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	
	<link rel="stylesheet" href="./css/css-unico.css" />
	        
            <link rel="StyleSheet" href="./css/acceder2.css" >
	<meta name="viewport" content="width=device-width"/>
</head>


    <body>
        <header>
            <img id="IMGencabezado" src="IMG/Logo.jpg">           
        </header>
    
        <section>
            <article >
                 <img id="vendedor" src="IMG/vendedor.jpg"/>	
            </article>
            
            <article>
   
            
                    <nav class="acceder2">
                       <ul>
                          <li>
                             <a id="login2" href="#">
                                LOGIN <span>▼</span>
                             </a>
                             <div id="login-content2">
                                       
                            
				
		                     		<form action="./php/login.php" method="post">
			
			                               
			  
			                             <input type="text" name="nombre" placeholder="Usuario" size="20" />
  			                             <br />
  			                             <br />
  			                             
			                             <input type="password" name="clave" placeholder="Password" size="20" />
			                             <br />
			                             <br />
			                             <input type="submit" id="submit" name="btnenviar" value="Enviar" />
			
			
			                        </form>
			                  
                             </div>                     
                          </li>
                       </ul>
                    </nav>
                    
                    
                 <img id="admin" src="IMG/admin.jpg">
            </article>
        </section>
              
    
         
          <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                <script>
                    $(function(){
                       $('#login2').click(function(){
                       $(this).next('#login-content2').slideToggle();
                       $(this).toggleClass('active');          

                       if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
                          else $(this).find('span').html('&#x25BC;')
                       })
                    });
                </script>
       
        
        
    
    </body>

</html>