<?php
	class Alumno extends Persona{
		private $legajo;
		private $fechaInsc;
		

		function __construct($legajo, $fechaInsc, $nombre, $apellido, $dni, $direccion){
			$this->legajo=$legajo;
			$this->fechaInsc=$fechaInsc;
			$this->nombre=$nombre;
			$this->apellido=$apellido;
			$this->dni=$dni;
			$this->direccion=$direccion;
		}

		function getLegajo(){
			return $this->legajo;
		}

		function setLegajo($leg){
			$this->legajo=$leg;
		}

		function getFecha(){
			return $this->fechaInsc;
		}

		function setFecha($fecha){
			$this->fechaInsc=$fecha;
		}

		function mostrarHtml(){
			echo '<h1>Alumno</h1>
				<br><p>'.$this->legajo.'</p>
				<br><p>'.$this->fechaInsc.'</p>
				<br><p>'.$this->nombre.'</p>
				<br><p>'.$this->apellido.'</p>
				<br><p>'.$this->dni.'</p>
				<br><p>'.$this->direccion->mostrarHtml().'</p>';
		}
	}
?>