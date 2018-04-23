<?php
class Alumno
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $nombre;
 	private $legajo;
  	private $archivo;
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
	public function GetLegajo()
	{
		return $this->legajo;
	}
	public function GetNombre()
	{
		return $this->nombre;
	}
	public function GetArchivo()
	{
		return $this->archivo;
	}

	public function SetLegajo($valor)
	{
		$this->legajo = $valor;
	}
	public function SetNombre($valor)
	{
		$this->nombre = $valor;
	}
	public function SetArchivo($valor)
	{
		$this->archivo = $valor;
	}

//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($legajo, $nombre, $archivo)
	{
		$this->legajo = $legajo;
		$this->nombre = $nombre;
		$this->archivo = $archivo;
		
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->legajo." - ".$this->nombre." - ".$this->archivo."\r\n";
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODOS DE CLASE
	public static function Alta($obj)
	{
		$resultado = FALSE;
		
		//ABRO EL ARCHIVO
		$ar = fopen("archivos/alumno.txt", "a");
		
		//ESCRIBO EN EL ARCHIVO
		$cant = fwrite($ar, $obj->ToString());
		
		if($cant > 0)
		{
			$resultado = TRUE;			
		}
		//CIERRO EL ARCHIVO
		fclose($ar);
		
		return $resultado;
	}
	public static function TraerTodosLosAlumnos()
	{

		$ListaDeAlumnosLeidos = array();

		//leo todos los productos del archivo
		$archivo=fopen("archivos/alumno.txt", "r");
		
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);
			$alumnos = explode(" - ", $archAux);
			//http://www.w3schools.com/php/func_string_explode.asp
			$alumnos[0] = trim($alumnos[0]);
			if($alumnos[0] != ""){
				$ListaDeAlumnosLeidos[] = new Alumno($alumnos[0], $alumnos[1],$alumnos[2]);
			}
		}
		fclose($archivo);
		echo "LEE OK";
		return $ListaDeAlumnosLeidos;
		
		
	}
	public static function Modificar($obj)
	{
		$resultado = TRUE;
		
		$ListaDeAlumnosLeidos = Alumno::TraerTodosLosAlumnos();
		$ListaDeAlumnos = array();
		$imagenParaBorrar = NULL;
		
		for($i=0; $i<count($ListaDeAlumnosLeidos); $i++){
			if($ListaDeAlumnosLeidos[$i]->legajo == $obj->legajo){//encontre el modificado, lo excluyo
				$imagenParaBorrar = trim($ListaDeAlumnosLeidos[$i]->pathFoto);
				$ListaDeAlumnosLeidos[$i] = $obj;
				//continue;
			}
			//$ListaDeProductos[$i] = $ListaDeProductosLeidos[$i];
		}

		//array_push($ListaDeProductos, $obj);//agrego el producto modificado
		
		//BORRO LA IMAGEN ANTERIOR
		unlink("archivos/".$imagenParaBorrar);
		
		//ABRO EL ARCHIVO
		$ar = fopen("archivos/alumno.txt", "w");
		
		//ESCRIBO EN EL ARCHIVO
		foreach($ListaDeAlumnosLeidos AS $item){
			$cant = fwrite($ar, $item->ToString());
			
			if($cant < 1)
			{
				$resultado = FALSE;
				break;
			}
		}
		
		//CIERRO EL ARCHIVO
		fclose($ar);
		
		return $resultado;
	}
	public static function Baja($legajo)
	{
		if($legajo === NULL)
			return FALSE;
			
		$resultado = TRUE;
		
		$ListaDeAlumnosLeidos = Alumno::TraerTodosLosAlumnos();
		$ListaDeAlumnos = array();
		$imagenParaBorrar = NULL;
		
		for($i=0; $i<count($ListaDeAlumnosLeidos); $i++){
			if($ListaDeAlumnosLeidos[$i]->legajo == $legajo){//encontre el borrado, lo excluyo
				$imagenParaBorrar = trim($ListaDeAlumnosLeidos[$i]->pathFoto);
				continue;
			}
			$ListaAlumnos[$i] = $ListaDeAlumnosLeidos[$i];
		}

		//BORRO LA IMAGEN ANTERIOR
		//unlink("archivos/".$imagenParaBorrar);
		
		//ABRO EL ARCHIVO
		$ar = fopen("archivos/alumno.txt", "w");
		
		//ESCRIBO EN EL ARCHIVO
		foreach($ListaDeAlumnos AS $item){
			$cant = fwrite($ar, $item->ToString());
			
			if($cant < 1)
			{
				$resultado = FALSE;
				break;
			}
		}
		
		//CIERRO EL ARCHIVO
		fclose($ar);
		
		return $resultado;
	}
//--------------------------------------------------------------------------------//
}