<?php
require_once 'usuario.php';
require_once 'IApiUsable.php';

class UsuarioApi extends Usuario implements IApiUsable
{
 	
    public function TraerTodos($request, $response, $args) {
      	$todosLosUsuarios=Usuario::traerTodosLosUsuarios();
     	$newresponse = $response->withJson($todosLosUsuarios, 200);  
    	return $newresponse;
    }

    public function CargarUno($request, $response, $args) {
     	
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
        $nombre= $ArrayDeParametros['nombre'];
        $clave= $ArrayDeParametros['clave'];
        
        $miUsuario = new Usuario();
        $miUsuario->nombre=$nombre;
        $miUsuario->clave=$clave;
        $miUsuario->InsertarUsuarioParametros();
        $objDelaRespuesta->respuesta="Se guardo el usuario.";   
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function BorrarUno($request, $response, $args){
        
    }
}