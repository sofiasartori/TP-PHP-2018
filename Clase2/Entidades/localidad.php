<?php
	class Localidad{

		private $codigoPostal;
		private $nombre;
		
		function __construct($codigoPostal, $nombre){
			$this->codigoPostal = $codigoPostal;
			$this->nombre = $nombre;
		}

		function getCodigoPostal(){
			return $this->codigoPostal;
		}

		function setCodigoPostal($cod){
			$this->codigoPostal=$cod;
		}

		function getNombre(){
			return $this->nombre;
		}

		function setNombre($nom){
			$this->nombre=$nom;
		}

		function mostrarHtml(){
			echo '<h1>Localidad</h1>
				<br><p>'.$this->nombre.'</p>
				<br><p>'.$this->codigoPostal.'</p>';
		}
		
	}
?>