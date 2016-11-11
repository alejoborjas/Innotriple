<?php

	switch ($_GET["accion"]) {
		case 'eliminar':
			include_once("../class/class_conexion.php");
			include_once("../class/class_factura.php");
			include_once("../class/class_usuario.php");
			$link = new Conexion();
			$codigo_usuario = Factura::eliminarFactura($link, $_POST["codigoApartado"]);
			Usuario::eliminarUsuario($link, $codigo_usuario);
			echo "<h2>Apartado eliminado con exito</h2>";
			$link->cerrarConexion();
			break;
		
		default:
			//Error
			break;
	}

?>