<?php
	class Persona implements iMostrable{//esta clase va a ser abstracta

		private $nombre;
		private $apellido;
		private $dni;
		private $direccion;


		function __construct($nombre, $apellido, $dni, $direccion){
			$this->nombre=$nombre;
			$this->apellido=$apellido;
			$this->dni=$dni;
			$this->direccion=$direccion;
		}

		function getApellido(){
			return $this->apellido;
		}

		function setApellido($ape){
			$this->apellido=$ape;
		}

		function getNombre(){
			return $this->nombre;
		}

		function setNombre($nom){
			$this->nombre=$nom;
		}

		function getDni(){
			return $this->dni;
		}

		function setDni($dni){
			$this->dni=$dni;
		}

		function getDireccion(){
			return $this->direccion;
		}

		function setDireccion($dire){
			$this->direccion=$dire;
		}

		function mostrarHtml(){
			echo '<h1>Persona</h1>
				<br><p>'.$this->nombre.'</p>
				<br><p>'.$this->apellido.'</p>
				<br><p>'.$this->dni.'</p>
				<br><p>'.$this->direccion->mostrarHtml().'</p>';
		}
	}
?>