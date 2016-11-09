
<html>
<head>
<body background="img/fondo/fondo5.jpg">
	<title>Iniciar Sesion</title>
<H1 align="center"> Iniciar Sesion</H1>
<STYLE type="text/css">
  BODY {text-align: center}
 </STYLE>

<form action="class/class_validar.php" method="post">
     
    Email:  
    <input type="email" name="email" placeholder="Pon email valido" />
    <br />
    contraseña:  
    <input type="password" name="contraseña" placeholder="Pon contraseña valido" />
    <br />
    <input type="submit" value="iniciar Sesion" />
   
</form>
<form action="index.php" method="post" name="form">
    <input type="submit" value="cancelar" />
</form>
</body>
</html>
