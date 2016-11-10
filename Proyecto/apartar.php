<?php 
	include_once("class/class_conexion.php");
	include_once("class/class_factura.php");
	include_once("class/class_usuario.php");
	include_once("class/class_pulsera.php");
	$link = new Conexion();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Apartado</title>
</head>
<body>
	<h1 align="center">Aparte su pulsera</h1>
	<form method="POST" action="apartar.php">
  		Nombre:
  		<input type="text" name="nombre" id="nombre" placeholder="Ingrese su Nombre"></input>
  		<br>
  		Apellido:
  		<input type="text" name="apellido" id="apellido" placeholder="Ingrese su Apellido"></input>
  		<br>
  		Direccion:
  		<input type="text" name="direccion" id="direccion" placeholder="Ingrese su Direccion">
  		<br>
  		Pulsera: <?php Pulsera::generarSlcPulseras($link); ?>
  		<br>
  		<input type="submit">
  		<br>
	</form>
	<?php
		if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["direccion"]) && isset($_POST["pulsera"])) {
			$usuario = new Usuario($_POST['nombre'], $_POST['apellido'], $_POST['direccion']);
			$id_usuario = $usuario->agregarUsuario($link);
			$factura = new Factura($id_usuario, $_POST["pulsera"]);
			echo "<h1>FACTURA:</h1><br>";
			$factura->generarFactura($link);
		}
	?>
</body>
</html>