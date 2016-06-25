$(document).on('ready', function()
{
	$(".botoncompra").click(anade);
	$("#carrito").load("../sistema/carrito.php" );
	
	$(".botonborrar").click(borrar);
	
	function anade()
	{
		//$("#carrito").append( $(this).val() );
		
		$("#carrito").load("../sistema/carrito.php?p=" + $(this).val() );
		
	}
	
	
   function borrar()
	{
		//$("#carrito").append( $(this).val() );
		
		$("#carrito").load("../sistema/carrito.php?delete=" + $(this).val() );
		
	}
	
	
	
});
