<?php
//para get, los parametros van en "PARAMS" del postman

class UsuarioCarga{
	
	public $nombre;
	public $email;
	public $perfil;
	public $edad;
	public $clave;
	public $texto;
	

	function __construct(){
		$this->nombre=$_GET["nombre"];
		$this->email=$_GET["email"];
		$this->perfil=$_GET["perfil"];
		$this->edad=$_GET["edad"];
		$this->clave=$_GET["clave"];
		$this->texto=$this->email.'-'.$this->nombre.'-'.$this->perfil.'-'.$this->edad.'-'.$this->clave;
		$this->manejoArchivo($this->texto);
		
	}
	public function manejoArchivo($texto){
		
		$archivo=fopen('C:/xampp/htdocs/usuarios.txt', "a+");
		fwrite($archivo, $texto."\r\n");
		fclose($archivo);
	}

}
$user=new UsuarioCarga();
?>