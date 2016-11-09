<?php 
	include_once("class/class_conexion.php");
	include_once("class/class_factura.php");
	$link = new Conexion();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Apartado</title>
</head>
<body>
	<h1 align="center">Aparte su pulsera</h1>
	<form method="POST">
  		Nombre:
  		<input type="text" name="nombre" id="nombre" placeholder="Ingrese su Nombre"></input>
  		<br>
  		Apellido:
  		<input type="text" name="apellido" id="apellido" placeholder="Ingrese su Apellido"></input>
  		<br>
  		Direccion:
  		<input type="text" name="direccion" id="direccion" placeholder="Ingrese su Direccion">
  		<br>
  		<input type="submit">
  		<br>
	</form>
	<?php
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$direccion = $_POST['direccion'];

	Factura::agregarFactura($link, $nombre, $apellido, $direccion);
	?>
</body>
</html>