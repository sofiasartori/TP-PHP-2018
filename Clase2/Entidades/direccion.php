<?php
	class Direccion{

		private $calle;
		private $altura;
		private $localidad;

		function __construct($calle, $altura, $localidad){
			$this->calle=$calle;
			$this->altura=$altura;
			$this->localidad=$localidad;
		}

		function getCalle(){
			return $this->calle;
		}

		function setCalle($calle){
			$this->calle=$calle;
		}

		function getAltura(){
			return $this->altura;
		}

		function setAltura($alt){
			$this->altura=$alt;
		}

		function getLocalidad(){
			return $this->localidad;
		}

		function setLocalidad($loc){
			$this->localidad=$loc;
		}

		function mostrarHtml(){
			echo '<h1>Direccion</h1>
				<br><p>'.$this->calle.'</p>
				<br><p>'.$this->altura.'</p>
				<br><p>'.$this->localidad->mostrarHtml().'</p>';
		}

	}
?>