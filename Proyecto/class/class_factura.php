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

    public static function generarApartado($conexion, $codigo_pulsera){
    	$sql = "SELECT codigo_usuario, codigo_pulsera 
    	FROM tbl_apartados 
    	WHERE codigo_pulsera = ".$codigo_pulsera;
    	$resultado = $conexion->ejecutarInstruccion($sql);
    	$conexion->liberarResultado($resultado);
    }

    public static function agregarFactura($conexion, $nombre, $apellido, $direccion){
        $sql = sprintf("INSERT INTO tbl_usuarios VALUES (NULL, '%s','%s','%s')",
            $nombre,
            $apellido,
            $direccion
        );
    	$ingreso = $conexion->ejecutarInstruccion($sql);
        echo $sql;
    }
}
?>
