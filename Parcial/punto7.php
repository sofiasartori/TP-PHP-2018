<?php
/*UsuarioModificacionValidado.php: (por POST)se ingresarán todos los valores necesarios (incluida una imagen) para realizar los cambios 
en los datos del usuario, si el usuario es admin puede hacer los cambios en cualquier usuario, de lo contrario solo puede cabiar los datos propios unicamente. */

class UsuarioModificacionValidado{
    public $email;
    public $nombre;
    public $perfil;
    public $edad;
    public $clave;
    public $comentario;
    public $foto;

    function __construct(){
        $this->usuario=$_POST["usuario"];
        $this->email=$_POST["email"];
        $this->nombre=$_POST["nombre"];
        $this->perfil=$_POST["perfil"];
        $this->edad=$_POST["edad"];
        $this->clave=$_POST["clave"];
        $this->comentario=$_POST["comentario"];
        $this->foto=$_FILES["foto"]["tmp_name"];
        $this->nombreFoto=$_FILES["foto"]["name"];
        $this->buscarUsuario($this->usuario, $this->email, $this->nombre, $this->perfil, $this->edad, $this->clave, $this->comentario, $this->foto, $this->nombreFoto);
    }

    function buscarUsuario($usuario, $email, $nombre, $perfil, $edad, $clave, $comentario, $foto, $nombreFoto){
        $archivo=fopen('C:/xampp/htdocs/usuarios.txt', "r");
        $encontrado=false;
        while(!feof($archivo)&&($encontrado==false)){
            $linea=fgets($archivo);
            $datos=explode("-", $linea);     
            $datosNuevos=array($email, $nombre, $perfil, $edad, $clave);
            if(($datos[0]==$usuario)&&($datos[2]=="admin")){
                $encontrado=true;                
                UsuarioModificacionValidado::modificarUsuario($datos, $datosNuevos, $comentario, $foto, $nombreFoto);
            }
            else if(($datos[0]==$usuario)&&($datos[2]=="user")){
                $encontrado=true;
                UsuarioModificacionValidado::modificacionPropia($datos, $datosNuevos, $comentario, $foto, $nombreFoto, $usuario);
            }                
        }  
        if($encontrado == false)
            echo "El usuario no existe";    
    }

    function modificarUsuario($datos, $datosNuevos, $comentario, $foto, $nombreFoto){
        echo "cambio otro usuario";
        $archivo=fopen('C:/xampp/htdocs/usuarios.txt', "a+");
        $encontrado=false;
        while(!feof($archivo)&&$encontrado==false){
            $linea=fgets($archivo);
            $datos=explode("-", $linea);
            $lineaNueva=implode("-", $datosNuevos);
            if($datos[0]==$datosNuevos[0]){
                $encontrado=true;
                file_put_contents('C:/xampp/htdocs/usuarios.txt', str_replace($linea, $lineaNueva."\r\n", file_get_contents('C:/xampp/htdocs/usuarios.txt')));
                UsuarioModificacionValidado::modificarComentarioFoto($datosNuevos[0], $comentario, $foto, $nombreFoto);
            }
        }
        if($encontrado == false)
            echo "El usuario que se quiere modificar no existe";       
    }

    function modificacionPropia($datos, $datosNuevos, $comentario, $foto, $nombreFoto, $usuario){
        echo "me cambio a mi mismo";
        $archivo=fopen('C:/xampp/htdocs/usuarios.txt', "a+");
        while(!feof($archivo)){
            $linea=fgets($archivo);
            $datos=explode("-", $linea);
            $lineaNueva=implode("-", $datosNuevos);
            if($datos[0]==$usuario){
                file_put_contents('C:/xampp/htdocs/usuarios.txt', str_replace($linea, $lineaNueva."\r\n", file_get_contents('C:/xampp/htdocs/usuarios.txt')));
                file_put_contents('C:/xampp/htdocs/comentario.txt', str_replace($linea, $lineaNueva."\r\n", file_get_contents('C:/xampp/htdocs/usuarios.txt')));
                $archivo=fopen('C:/xampp/htdocs/comentario.txt', "a+");
                fwrite($archivo, $datosNuevos[0].'-'.$comentario."\r\n");
                $destino='C:/xampp/htdocs/ImagenesDeComentario/';
                $tipoArchivo=pathinfo($nombreFoto, PATHINFO_EXTENSION);                
                if(!file_exists($destino)){
                    mkdir($destino);
                    move_uploaded_file($foto, $destino.$comentario.'.'.$tipoArchivo);
                }
                else{
                    move_uploaded_file($foto, $destino.$comentario.'.'.$tipoArchivo);
                }
            }
        }  
    }

    function modificarComentarioFoto($email, $comentario, $foto, $nombreFoto){
        echo "esto en modificar comentario y foto";
        $archivoComentario=fopen('C:/xampp/htdocs/comentario.txt', "a+");
        while(!feof($archivoComentario)){
            $lineaComentario=fgets($archivoComentario);
            $comentarios=explode("-", $lineaComentario);
            $comentarioNuevo=$email.'-'.$comentario;
            if($comentarios[0]==$email){
                echo "linea comentario: ".$lineaComentario."\r\n";
                echo "comentarioNuevo: ".$comentarioNuevo."\r\n";
                file_put_contents('C:/xampp/htdocs/comentario.txt', str_replace($lineaComentario, $comentarioNuevo."\r\n", file_get_contents('C:/xampp/htdocs/comentario.txt')));
            }
        }               
        $destino='C:/xampp/htdocs/ImagenesDeComentario/';
        $tipoArchivo=pathinfo($nombreFoto, PATHINFO_EXTENSION);                
        if(!file_exists($destino)){
            mkdir($destino);
            move_uploaded_file($foto, $destino.$comentario.'.'.$tipoArchivo);
        }
        else{
            move_uploaded_file($foto, $destino.$comentario.'.'.$tipoArchivo);
        }
    }
}

$user= new UsuarioModificacionValidado();
/*VER COMO MODIFICAR EL COMENTARIO */
?>