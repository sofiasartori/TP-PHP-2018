<?php
require_once 'venta.php';
require_once 'IApiUsable.php';

class VentaApi extends Venta implements IApiUsable
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
        $media= $ArrayDeParametros['id_media'];
        $cliente= $ArrayDeParametros['nombre_cliente'];
        $precio= $ArrayDeParametros['precio'];
        $foto=$fotos['foto'];
        $fecha=date('d-m-y');

        $destino='C:/xampp/htdocs/fotosVentas/';
        $idFoto = $media.'-'.$cliente.'-'.$fecha;
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

        $miVenta = new Venta();
        $miVenta->idMedia=$media;
        $miVenta->nombreCliente=$cliente;
        $miVenta->importe=$precio;        
        $miVenta->foto=$destino.$idFoto.'.'.$tipoArchivo;
        $miVenta->InsertarVenta();
        $objDelaRespuesta->respuesta="Se guardo la venta.";   
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

    public function ModificarUno($request, $response, $args){
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        $fotos = $request->getUploadedFiles();
        $venta=$ArrayDeParametros['id_venta'];
        $media= $ArrayDeParametros['id_media'];
        $cliente= $ArrayDeParametros['nombre_cliente'];
        $precio= $ArrayDeParametros['precio'];
        $foto=$fotos['foto'];
        $fecha=date('d-m-y');

        $destino='C:/xampp/htdocs/fotosVentas/';
        $idFoto = $media.'-'.$cliente.'-'.$fecha;
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

        $miVenta = new Venta();
        $miVenta->idVenta=$venta;
        $miVenta->idMedia=$media;
        $miVenta->nombreCliente=$cliente;
        $miVenta->importe=$precio;        
        $miVenta->foto=$destino.$idFoto.'.'.$tipoArchivo;
        $miVenta->ModificarVenta();
        $objDelaRespuesta->respuesta="Se guardo la venta.";   
        return $response->withJson($objDelaRespuesta, 200);
    }
}