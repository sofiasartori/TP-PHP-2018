<?php
require_once('alumno.php');
class Archivo{

	public static function Subir($nombre, $legajo)
	{
		$retorno["Exito"] = TRUE;
		var_dump($_FILES["foto"]["name"]);
		//INDICO CUAL SERA EL DESTINO DEL ARCHIVO SUBIDO
		$archivoTmp = $nombre.'-'.$legajo.".jpg";
		$destino = "fotos/" . $archivoTmp;
		
		$tipoArchivo = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);

		//VERIFICO EL TAMAÑO MAXIMO QUE PERMITO SUBIR
		if ($_FILES["foto"]["size"] > 500000) {
			$retorno["Exito"] = FALSE;
			$retorno["Mensaje"] = "El archivo es demasiado grande. Verifique!!!";
			return $retorno;
		}

		//OBTIENE EL TAMAÑO DE UNA IMAGEN, SI EL ARCHIVO NO ES UNA
		//IMAGEN, RETORNA FALSE
		$esImagen = getimagesize($_FILES["foto"]["tmp_name"]);

		if($esImagen === FALSE) {//NO ES UNA IMAGEN
			$retorno["Exito"] = FALSE;
			$retorno["Mensaje"] = "S&oacute;lo son permitidas IMAGENES.";
			return $retorno;
		}
		else {// ES UNA IMAGEN

			//SOLO PERMITO CIERTAS EXTENSIONES
			if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif"
				&& $tipoArchivo != "png") {
				$retorno["Exito"] = FALSE;
				$retorno["Mensaje"] = "S&oacute;lo son permitidas imagenes con extensi&oacute;n JPG, JPEG, PNG o GIF.";
				return $retorno;
			}
		}
		
		if(!file_exists('fotos/')){
			mkdir('fotos/');
		}

		if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $destino)) {

			$retorno["Exito"] = FALSE;
			$retorno["Mensaje"] = "Ocurrio un error al subir el archivo. No pudo guardarse.";
			return $retorno;
		}
		else{
			$retorno["Mensaje"] = "Archivo subido exitosamente!!!"; 
			$retorno["PathTemporal"] = $archivoTmp;
			
			return $retorno;
		}
	}

	public static function Borrar($path)
	{
		return unlink($path);
	}

	public static function Mover($pathOrigen, $pathDestino)
	{
		return copy($pathOrigen, $pathDestino);
	}
}
?>