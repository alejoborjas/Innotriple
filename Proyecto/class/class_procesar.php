<?php

include 'class_usuario.php';

class Procesar {
	public $nombre;
	public $contraseña;
	public $contraseña2;
	public $email;
	public $telefono;
	public $direccion;
	public $genero;

// funcion para verificar contraseña
public function validarcontraseña($contraseña, $contraseña2)
{
	if($contraseña!=$contraseña2)
	{
		return false;
	}
	else
	{
		return true;
	}

}
// funcion para verificar contraseña
public function validarcampos($nombre,$contraseña, $contraseña2,$email,$telefono,$direccion,$genero)
{
	if($nombre!=null && $contraseña!=null && $contraseña2!=null && $email!=null && $telefono!=null && $direccion!=null && $genero!=null)
	{
		return true;
	}
	else
	{
		return false;
	}
}

}


//instancia de la clase y registro de datos
$usuario=new Procesar();
$usuario->nombre=$_POST['username'];
$usuario->contraseña=$_POST['contraseña'];
$usuario->contraseña2=$_POST['confirmar'];
$usuario->email=$_POST['email'];
$usuario->telefono=$_POST['telefono'];
$usuario->direccion=$_POST['Direccion'];
$usuario->genero=$_POST['genero'];

//validar campos vacios y contraseñas iguales
if($usuario::validarcampos($usuario->nombre,$usuario->contraseña,$usuario->contraseña2,$usuario->email,$usuario->telefono,$usuario->direccion,$usuario->genero)==true)
{

	if($usuario::validarcontraseña($usuario->contraseña,$usuario->contraseña2)==true)
       	{
		$cadena= serialize($usuario);
		header('Location: pagina.php');
		$guardar = new crearUsuario();
		$guardar->guardarCuenta($cadena);
		} 
	else
 		{	
		header('Location: registro.php');
  		}
}  		
else 
 {
  header('Location: registro.php');	
 }



?>