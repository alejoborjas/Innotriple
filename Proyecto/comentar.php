<!DOCTYPE html>
<html>
<head>
	<title>Comentarios</title>
</head>
<body>
<style type="text/css">
  body {text-align: center}
</style>
	<form method="POST">
  		<textarea type="text" name="comentario" id="comentario" rows="20" cols="50" placeholder="Ingrese sus comentarios"></textarea>
  		<br>
  		<textarea type="text" name="email" id="email" rows="1" cols="50" placeholder="Ingrese su Usuario"></textarea>
  		<br>
  		<input type="submit">
  		<br>
	</form>
	<form action="pagina.php" method="post" name="form">
    <input type="submit" value="Volver a Inicio" />
</form>
</body>
</html>
<?php
	include_once("class/class_comment.php");


	if (isset($_POST["comentario"]) && isset($_POST["email"])) {
		$comment = new Comment($_POST["comentario"], $_POST["email"]);
		$comment->agregarComentario();
	}
?>