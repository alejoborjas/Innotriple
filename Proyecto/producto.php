<?php 
	include_once("class/class_conexion.php");
	include_once("class/class_pulsera.php");
	$link = new Conexion();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Productos</title>
</head>
<body>
	<h1 align="center">Catalogo de Pulseras</h1><br>
	<?php echo Pulsera::generarPulseras($link); ?>

</body>
</html>