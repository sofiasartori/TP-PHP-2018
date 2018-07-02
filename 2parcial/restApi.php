<?php
/*don julian, tienda de medias->(id, color, marca, precio, talle, foto) usuarios-> (id, nombre, clave)
1)post (sin token) alta media
2)get listado (sin token)
3)post usuario alta (sin token)
4)login retorna token
4)get listado usuarios (solo con token)*/

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once '/vendor/autoload.php';
require_once '/clases/AccesoDatos.php';
require_once '/clases/mediaApi.php';
require_once '/clases/usuario.php';
require_once '/clases/usuarioApi.php';
require_once '/clases/ventaApi.php';
require_once '/clases/AutentificadorJWT.php';
require_once '/clases/MWparaCORS.php';
require_once '/clases/MWparaAutentificar.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;


$app = new \Slim\App(["settings" => $config]);


/*LLAMADA A METODOS DE INSTANCIA DE UNA CLASE*/
$app->group('/media', function () {
 
  $this->get('/', \MediaApi::class . ':traerTodos')->add(\MWparaCORS::class . ':HabilitarCORSTodos');
 
  $this->post('/', \MediaApi::class . ':CargarUno');  

  $this->delete('/', \MediaApi::class . ':BorrarUno')->add(\MWparaAutentificar::class . ':VerificarUsuario');
     
})->add(\MWparaCORS::class . ':HabilitarCORS8080');

$app->group('/usuario', function () {

    $this->get('/', \UsuarioApi::class . ':traerTodos')->add(\MWparaAutentificar::class . ':VerificarUsuario')->add(\MWparaCORS::class . ':HabilitarCORSTodos');
  
    $this->post('/', \UsuarioApi::class . ':CargarUno');
  
})->add(\MWparaCORS::class . ':HabilitarCORS8080');

$app->group('/venta', function () {

  $this->put('/', \VentaApi::class . ':ModificarUno')->add(\MWparaAutentificar::class . ':VerificarUsuarioVenta')->add(\MWparaCORS::class . ':HabilitarCORSTodos');

  $this->post('/', \VentaApi::class . ':CargarUno')->add(\MWparaAutentificar::class . ':VerificarUsuarioVenta')->add(\MWparaCORS::class . ':HabilitarCORSTodos');

})->add(\MWparaCORS::class . ':HabilitarCORS8080');

$app->post('/login/', function (Request $request, Response $response) {
  $datos = $request->getParsedBody();
  $nombre=$datos['nombre'];
  $clave=$datos['clave'];

  $usuario=new Usuario();
	$usuarioBuscado=$usuario->TraerUnUsuario($nombre, $clave);
	$perfilJWT = $usuarioBuscado->perfil;
  $data=array('Nombre'=>$nombre, 'Perfil'=>$perfilJWT);
  $token= AutentificadorJWT::CrearToken($data); 
  $newResponse = $response->withJson($token, 200); 
  return $newResponse;
});

$app->run();


?>
