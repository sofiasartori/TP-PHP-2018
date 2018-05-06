<?php
	class Profesor extends Persona{
		private $materias;
		private $dias;		

		function __construct($materias, $dias, $nombre, $apellido, $dni, $direccion){
			$this->materias=$materias;
			$this->dias=$dias;
			$this->nombre=$nombre;
			$this->apellido=$apellido;
			$this->dni=$dni;
			$this->direccion=$direccion;
		}

		function getmaterias(){
			return $this->materias;
		}

		function setmaterias($mat){
			$this->materias=$mat;
		}

		function getDias(){
			return $this->dias;
		}

		function setDias($dias){
			$this->dias=$dias;
		}

		function mostrarHtml(){
			echo '<h1>Profesor</h1>
				<br>';
				foreach ($this->materias as $key) {
					echo '<p>'.$key.'</p>';
				}
				echo '<br>';
				foreach ($this->dias as $llave) {
					echo '<p>'.$llave.'</p>';
				}
				echo'<br><p>'.$this->nombre.'</p>
				<br><p>'.$this->apellido.'</p>
				<br><p>'.$this->dni.'</p>
				<br><p>'.$this->direccion->mostrarHtml().'</p>';
		}
	}
?>