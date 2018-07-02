<?php
require_once './vendor/autoload.php';
use Firebase\JWT\JWT;

class AutentificadorJWT
{
    private static $donJulian = 'DonJulian@';
    private static $tipoEncriptacion = ['HS256'];
    private static $aud = null;
    
    public static function CrearToken($datos)
    {
        $ahora = time();
        /*
         parametros del payload
         https://tools.ietf.org/html/rfc7519#section-4.1
         + los que quieras ej="'app'=> "API REST CD 2017" 
        */
        $payload = array(
        	'iat'=>$ahora,
            'exp' => $ahora + (60*60),
            'aud' => self::Aud(),
            'data' => $datos
        );
     
        return JWT::encode($payload, self::$donJulian);
    }
    
    public static function VerificarToken($token)
    {
       
        if(empty($token)|| $token=="")
        {
            throw new Exception("El token esta vacio.");
        } 
        // las siguientes lineas lanzan una excepcion, de no ser correcto o de haberse terminado el tiempo       
        try {
            $decodificado = JWT::decode(
            $token,
            self::$donJulian,
            self::$tipoEncriptacion
            );
        } catch (ExpiredException $e) {
            //var_dump($e);
           throw new Exception("Clave fuera de tiempo");
        }
        
        // si no da error,  verifico los datos de AUD que uso para saber de que lugar viene  
        if($decodificado->aud !== self::Aud())
        {
            throw new Exception("No es el usuario valido");
        }
    }
    
   
     public static function ObtenerPayLoad($token)
    {
        return JWT::decode(
            $token,
            self::$donJulian,
            self::$tipoEncriptacion
        );
    }
     public static function ObtenerData($token)
    {
        return JWT::decode(
            $token,
            self::$donJulian,
            self::$tipoEncriptacion
        )->data;
    }
    private static function Aud()
    {
        $aud = '';
        
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $aud = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $aud = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $aud = $_SERVER['REMOTE_ADDR'];
        }
        
        $aud .= @$_SERVER['HTTP_USER_AGENT'];
        $aud .= gethostname();
        
        return sha1($aud);
    }
}