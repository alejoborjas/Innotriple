<?php
	class Factura{
		private $codigo_usuario;
		private $codigo_pulsera;

	function __construct($codigo_usuario, $codigo_pulsera){
		$this->codigo_usuario= $codigo_usuario;
		$this->codigo_pulsera= $codigo_pulsera;
	}

    public function getCodigoUsuario()
    {
        return $this->codigo_usuario;
    }

    private function _setCodigoUsuario($codigo_usuario)
    {
        $this->codigo_usuario = $codigo_usuario;

        return $this;
    }

    public function getCodigoPulsera()
    {
        return $this->codigo_pulsera;
    }

    private function _setCodigoPulsera($codigo_pulsera)
    {
        $this->codigo_pulsera = $codigo_pulsera;

        return $this;
    }

    public function generarFactura($conexion){
        $sql = sprintf("
            SELECT a.codigo_usuario, a.nombre, a.apellido, a.direccion, b.codigo_pulsera, b.imagen, b.precio
            FROM tbl_usuarios a
            INNER JOIN tbl_pulseras b
            WHERE (a.codigo_usuario = '%s')
            AND (b.codigo_pulsera = '%s')",
            $this->codigo_usuario,
            $this->codigo_pulsera
        );
        $resultado = $conexion->ejecutarInstruccion($sql);
        echo "<h3>";
        while ($fila = $conexion->obtenerFila($resultado)) {
            echo "NOMBRE: ".$fila["nombre"]." ".$fila["apellido"]."<br>";
            echo "DIRECCION: ".$fila["direccion"]."<br>";
            echo "PRECIO: ".$fila["precio"]."<br>";
            echo "PULSERA #".$fila["codigo_pulsera"].": <img src='".$fila["imagen"]."' height='42' width='42'><br>";
        }
        echo "</h3>";
        $conexion->liberarResultado($resultado);
    }

}
?>
