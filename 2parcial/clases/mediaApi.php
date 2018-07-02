<?php
require_once 'media.php';
require_once 'IApiUsable.php';

class MediaApi extends Media implements IApiUsable
{
 	
     public function TraerTodos($request, $response, $args) {
      	$todasLasMedias=Media::traerTodasLasMedias();
     	$newresponse = $response->withJson($todasLasMedias, 200);  
    	return $newresponse;
    }
      public function CargarUno($request, $response, $args) {
     	
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        $fotos = $request->getUploadedFiles();
        $color= $ArrayDeParametros['color'];
        $marca= $ArrayDeParametros['marca'];
        $precio= $ArrayDeParametros['precio'];
        $talle= $ArrayDeParametros['talle'];
        $foto=$fotos['foto'];


        $destino='C:/xampp/htdocs/fotosMedias/';
        $idFoto = $color.'-'.$precio.'-'.$talle;
        $nombreFoto=$foto->getClientFileName();        
        $tipoArchivo=pathinfo($nombreFoto, PATHINFO_EXTENSION);
        if($tipoArchivo != "jpg" && $tipoArchivo !="jpeg" && $tipoArchivo != "png") {
			echo "S&oacute;lo son permitidas imagenes con extensi&oacute;n JPG, JPEG o PNG.";
        }
        else{
            if(!file_exists($destino)){
                mkdir($destino);
                move_uploaded_file($foto->file, $destino.$idFoto.'.'.$tipoArchivo);
            }
            else{
                move_uploaded_file($foto->file, $destino.$idFoto.'.'.$tipoArchivo);
            }
        }

        $miMedia = new Media();
        $miMedia->color=$color;
        $miMedia->marca=$marca;
        $miMedia->precio=$precio;
        $miMedia->talle=$talle;
        $miMedia->foto=$destino.$idFoto.'.'.$tipoArchivo;
        $miMedia->InsertarMediaParametros();
        $objDelaRespuesta->respuesta="Se guardo la media.";   
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function BorrarUno($request, $response, $args){
        $objDelaRespuesta= new stdclass();
        $ArrayDeParametros = $request->getParsedBody();
        $id= $ArrayDeParametros['id'];

        $miMedia=new Media();
        $miMedia->id=$id;
        $miMedia->BorrarMedia();
        $objDelaRespuesta->respuesta="Se eliminó la media.";   
        return $response->withJson($objDelaRespuesta, 200);
    }
}