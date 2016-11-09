<?php
 class validarsesion {
public $email;
public $contraseña;
 }


$user=new validarsesion();
$user->email=$_POST['email'];
$user->contraseña=$_POST['contraseña']; 
$recurso=fopen("usuario.dat", 'r' );
$tamaño=filesize("usuario.dat");
$registro=fread($recurso, $tamaño); 

//var_dump($registro);
$registros=explode(";}" , $registro);


for($i=0;$i<count($registros)-1;$i++) {

$buscar1=$_POST['email'];
$buscar2=$_POST['contraseña'];	
$pos= strpos($registros[$i],$buscar1);
$pos1=strpos($registros[$i], $buscar2);


if( $pos !== false && $pos1 !== false){
 header('Location: pagina.php');

}
else {
header('Location: iniciarsesion.php');

}
}





