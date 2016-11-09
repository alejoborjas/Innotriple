<!DOCTYPE>
<head>
<style >
	body {background-color: black;}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galeria</title>

</head>

<body>
<h1 style="color:white;" align="Center">Galeria de Producto</h1>
<br>
<?php
    $directory="../img/galeria";
    $dirint = dir($directory);
    while (($archivo = $dirint->read()) !== false)
    { 
    	$imagenRuta = $directory."/".$archivo;
    	if (preg_match('/.jpg/', $imagenRuta, $matches)) {
    	 
        
        echo '<img src="' . $imagenRuta . '" height="100" HSPACE="15" VSPACE="15">';
    	 } 
   
        
    }
     $dirint->close();
?>
</body>
</html>