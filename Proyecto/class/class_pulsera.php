<?php

class Pulsera
{
	
	private $codigo;
	private $disponibles;
	private $url_imagen;
	private $precio;

	function __construct($codigo, $disponibles, $url_imagen, $precio)
	{
		$this->codigo = $codigo;
		$this->disponibles = $disponibles;
		$this->url_imagen = $url_imagen;
		$this->precio = $precio;
	}

    public function getCodigo()
    {
        return $this->codigo;
    }

    private function _setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getDisponibles()
    {
        return $this->disponibles;
    }

    private function _setDisponibles($disponibles)
    {
        $this->disponibles = $disponibles;

        return $this;
    }

    public function getUrlImagen()
    {
        return $this->url_imagen;
    }

    private function _setUrlImagen($url_imagen)
    {
        $this->url_imagen = $url_imagen;

        return $this;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    private function _setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    public static function generarPulseras($conexion){
    	$sql = "
    		SELECT codigo_pulsera, imagen, disponibles, precio 
    		FROM tbl_pulseras 
    	";

    	$resultado = $conexion->ejecutarInstruccion($sql);

    	while ($fila = $conexion->obtenerFila($resultado)) {
    		echo '<img src="'.$fila["imagen"].'">';
    		echo "<br>";
    		echo "Disponibles: ". $fila["disponibles"]. "<br>";
    		echo "Precio: ".$fila["precio"]. "<br>";
    		echo "<a href='apartar.php?codigo_pulsera=".$fila['codigo_pulsera']."'>Apartar</a>";
    		echo "<br>";
    	}
    	$conexion->liberarResultado($resultado);
    }

    public static function generarSlcPulseras($conexion){
        $sql = "
            SELECT codigo_pulsera, imagen, disponibles, precio 
            FROM tbl_pulseras 
        ";

        $resultado = $conexion->ejecutarInstruccion($sql);

        echo "<select name='pulsera' id='pulsera'>";
        while ($fila = $conexion->obtenerFila($resultado)) {
            echo "<option value='".$fila["codigo_pulsera"]."'>";
            echo "Pulsera #".$fila["codigo_pulsera"];
            echo "</option>";
        }
        echo "</select>";
        $conexion->liberarResultado($resultado);
    }
}

?>