<?php

	class Comment{
		
		private $comentario;
		private $email;

		function __construct($comentario, $email){
			$this->comentario = $comentario;
			$this->email = $email;
		}
	
		public function getComentario()
		{
		    return $this->comentario;
		}
		 
		public function setComentario($comentario)
		{
		    $this->comentario = $comentario;
		}
		
		public function getEmail()
		{
		    return $this->email;
		}
		 
		public function setEmail($email)
		{
		    $this->email = $email;
		}

		public function agregarComentario(){
			$archivo= fopen("comentarios.csv", "a");
			fwrite($archivo,
					$this->email. ",".
					$this->comentario."\n");
			fclose($archivo);
		}
	}
