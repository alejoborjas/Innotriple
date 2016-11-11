<?php
	class Factura{
        private $codigo_factura;
        private $codigo_usuario;
        private $codigo_pulsera;

    	function __construct($codigo_usuario, $codigo_pulsera){
    		$this->codigo_usuario= $codigo_usuario;
    		$this->codigo_pulsera= $codigo_pulsera;
    	}

        public function getCodigoUsuario(){
            return $this->codigo_usuario;
        }

        private function setCodigoUsuario($codigo_usuario){
            $this->codigo_usuario = $codigo_usuario;
        }

        public function getCodigoPulsera(){
            return $this->codigo_pulsera;
        }

        private function setCodigoPulsera($codigo_pulsera){
            $this->codigo_pulsera = $codigo_pulsera;
        }

        public function getCodigoFactura(){
            return $this->codigo_factura;
        }
         
        public function setCodigoFactura($codigo_factura){
            $this->codigo_factura = $codigo_factura;
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

    public function agregarFactura($conexion){
        $sql = sprintf("
            INSERT INTO tbl_factura VALUES ( null, '%s', '%s')",
        $this->codigo_usuario,
        $this->codigo_pulsera);
        $conexion->ejecutarInstruccion($sql);
        $this->codigo_factura = $conexion->obtenerFila($conexion->ejecutarInstruccion("SELECT last_insert_id() as id;"))["id"];
        return $this->codigo_factura;
    }

    public static function eliminarFactura($conexion, $codigo_factura){
        $sql = sprintf("
            SELECT codigo_factura, codigo_pulsera, codigo_usuario 
            FROM tbl_factura
            WHERE codigo_factura = '%s'",
        $codigo_factura
        );

        $fila = $conexion->obtenerFila($conexion->ejecutarInstruccion($sql));

        $sql = sprintf("
            DELETE FROM tbl_factura
            WHERE codigo_factura = '%s'",
        $codigo_factura
        );

        $conexion->ejecutarInstruccion($sql);
        
        return $fila["codigo_usuario"];
    }


    }
?>
