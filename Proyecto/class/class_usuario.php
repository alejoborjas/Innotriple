<?php  
	class crearUsuario  
	{
		function guardarCuenta($usuario){
			
			$cadena=json_encode($usuario);
			$con=fopen("usuario.dat", "a") or die("error");

			fputs($con,$cadena);
			fputs($con,"\n");
			fclose($con);
		} 
	}
	
?>