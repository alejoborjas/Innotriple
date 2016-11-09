<!DOCTYPE html>
<html>
<head>
<body background="img/fondo/fondo3.jpg">
	<title>Registro de Usuario</title>
<H1 align="center"> Crea tu cuenta</H1>
<STYLE type="text/css">
  BODY {text-align: center}
 </STYLE>

<form action="procesar.php" method="post" name="form">
    Nombre y apellido : 
    <input type="text" name="username" placeholder="nombre y apellido" />
    <br />
    contraseña:  
    <input type="password" name="contraseña" placeholder="contraseña" />
    <br />
    confirmar contraseña:  
    <input type="password" name="confirmar" placeholder="contraseña" />
    <br />
    Email:  
    <input type="email" name="email" placeholder="example@gmail.com" />
    <br />
    Telefono:  
    <input type="telefono" name="telefono" placeholder="telefono valido" />
    <br />
    Direccion:  
    <input list="Direccion" name="Direccion" placeholder="Direccion Valida">
    <datalist id="Direccion">
    <option value="Atlantida">
    <option value="Colon">
    <option value="Comayagua">
    <option value="Copan">
    <option value="Cortes">
    <option value="Choluteca">
    <option value="El Paraiso">
    <option value="Francisco Morazan">
    <option value="Gracias a Dios">
    <option value="Intibuca">
    <option value="La Paz">
    <option value="Lempira">
    <option value="Ocotepeque">
    <option value="Olancho">
    <option value="Santa Barbara">
    <option value="Valle">
    <option value="Yoro">
    </datalist>
    <br>
     Genero: 
    <input type="radio" name="genero" value="Masculino" checked> Masculino
    <input type="radio" name="genero" value="Femenino"> Femenino
    <br />
    <br />
    <input type="submit" value="Registrar" >
</form>
<form action="index.php" method="post" name="form">
    <input type="submit" value="cancelar" />
</form>
</body>
</html>
