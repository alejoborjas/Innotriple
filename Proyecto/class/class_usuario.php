<?php  
	class Usuario  {

		private $nombre;
		private $apellido;
		private $direccion;

		function __construct($nombre, $apellido, $direccion){
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->direccion = $direccion;
		}

		public function getNombre(){
		    return $this->nombre;
		}
		 
		public function setNombre($nombre){
		    $this->nombre = $nombre;
		}
		
		public function getApellido(){
		    return $this->apellido;
		}
		 
		public function setApellido($apellido){
		    $this->apellido = $apellido;
		}
		
		public function getDireccion(){
		    return $this->direccion;
		}
		 
		public function setDireccion($direccion){
		    $this->direccion = $direccion;
		}

	    public function agregarUsuario($conexion){
	        $sql = sprintf("INSERT INTO tbl_usuarios VALUES (NULL, '%s','%s','%s')",
	            $this->nombre,
	            $this->apellido,
	            $this->direccion
	        );
	    	$ingreso = $conexion->ejecutarInstruccion($sql);
	    	return $conexion->obtenerFila($conexion->ejecutarInstruccion("SELECT last_insert_id() as id;"))["id"];
	    }

		function guardarCuenta($usuario){
			
			$cadena=json_encode($usuario);
			$con=fopen("usuario.dat", "a") or die("error");

			fputs($con,$cadena);
			fputs($con,"\n");
			fclose($con);
		} 
	
	}
	
?>