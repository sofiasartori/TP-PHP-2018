<?php
//AltaComentarioConImagen.php: con imagen , guardando la imagen con el titulo del comentario en la carpeta /ImagenesDeComentario. 

class AltaComentarioConImagen{
    public $usuario;
    public $imagen;
    public $comentario;

    function __construct(){
        $this->usuario=$_POST["email"];
        $this->imagen=$_FILES["imagen"]["tmp_name"];
        $this->nombreImagen=$_FILES["imagen"]["name"];
        $this->comentario=$_POST["comentario"];
        $this->verificarDatos($this->usuario, $this->imagen, $this->comentario, $this->nombreImagen);
    }

    function verificarDatos($usuario, $imagen, $comentario, $nombreImagen){
        $archivo=fopen('C:/xampp/htdocs/usuarios.txt', "r");
        $encontrado=false;
        while(!feof($archivo)&&($encontrado==false)){
            $linea=fgets($archivo);
            $datos=explode("-", $linea);
            if($datos[0]==$usuario){
                $encontrado=true;
                AltaComentarioConImagen::imagenComentario($usuario, $comentario, $imagen, $nombreImagen);
            }
        }    
        if($encontrado == false)
            echo "El usuario no existe";
    }

    function imagenComentario($usuario, $comentario, $imagen, $nombreImagen){
        
        $destino='C:/xampp/htdocs/ImagenesDeComentario/';
        $tipoArchivo=pathinfo($nombreImagen, PATHINFO_EXTENSION);
        if($tipoArchivo != "png") {
			echo "S&oacute;lo son permitidas imagenes con extensi&oacute;n JPG, JPEG, PNG o GIF.";
        }
        else{
            $archivo=fopen('C:/xampp/htdocs/comentario.txt', "a+");
            fwrite($archivo, $usuario.'-'.$comentario."\r\n");
            if(!file_exists($destino)){
                mkdir($destino);
                move_uploaded_file($imagen, $destino.$comentario.'.'.$tipoArchivo);
            }
            else{
                move_uploaded_file($imagen, $destino.$comentario.'.'.$tipoArchivo);
            }
        }      
    }
}

$user=new AltaComentarioConImagen();
?>