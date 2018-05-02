<?php

/*Alta, baja y modificacion del alumno. atributos: nombre, legajo, archivo(foto), se va a guardar en el archivo alumno.txt 
y la foto va a ser nombre+legajo.extension y se va a guardar en el subdirectorio fotos
alumno alta, se tienen que pasar el nombre, legajo y foto x POST, el archivo x la clase archivo 

para la baja primero se crea uno que se llame alumnosborrados donde se guarden los alumnos.txt (alumnosBorrados/alumnos.txt)
 y otro donde diga fotosBorradas y va a estar la foto con la fecha
 
 la modificacion hay que crear alumnosModificados/alumnos.txt y la modificacion qe se hizo y la foto tambien guardarla
 fotoCambiada/fotofecha.extension
 y por ultimo el listado, una tabla html con el tag image (parte por chrome con get y no recibe parametros, solo para lo que va a hacer)*/
require_once ("Entidades/alumno.php");
require_once ("Entidades/archivo.php");
//var_dump($_POST);

//var_dump($_FILES);
$queHago = $_SERVER["REQUEST_METHOD"];
ECHO $queHago;
switch($queHago){


	case "POST":
		$nombre = $_POST["nombre"];
		$legajo = $_POST["legajo"];
		$respuestaDeSubir = Archivo::Subir($nombre, $legajo);

		if(!$respuestaDeSubir["Exito"]){
			echo "error " .$respuestaDeSubir["Mensaje"];
			break;
		}
		$archivo = $respuestaDeSubir["PathTemporal"];
		echo "Bien " ;
		/*
		$codBarra = isset($_POST['codBarra']) ? $_POST['codBarra'] : NULL;
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : NULL;
		$archivo = $res["PathTemporal"];
*/
	//	$p = new Alumno($codBarra, $nombre, $archivo);
		
		$p = new Alumno($legajo, $nombre ,$archivo );

		if(!Alumno::Alta($p)){
			echo "Error al generar archivo";
			break;
		}
		
		break;
		
	case "DELETE":
		parse_str(file_get_contents('php://input'), $requestData);
		$legajo= $requestData["legajo"];
		if(!Alumno::Baja($legajo)){
			$mensaje = "Lamentablemente ocurrio un error y no se pudo escribir en el archivo.";
		}
		else{
			$mensaje = "El archivo fue escrito correctamente. Alumno eliminado CORRECTAMENTE!!!";
		}
	
		echo $mensaje;
		
		break;
		
	case "PUT":
		
		parse_str(file_get_contents("php://input"), $put);
				
		$nombre = $put["nombre"];
		$legajo = $put["legajo"];
		$respuestaDeSubir = Archivo::Subir($nombre, $legajo);

		if(!$respuestaDeSubir["Exito"]){
			echo "error " .$respuestaDeSubir["Mensaje"];
			break;
		}
		$archivo = $respuestaDeSubir["PathTemporal"];
		echo "Bien " ;
		
		$p = new Alumno($legajo, $nombre ,$archivo );

		if(!Alumno::Modificar($p)){
			echo "Error al generar archivo";
			break;
		}
		break;
	default:
		echo ":(";
}
?>