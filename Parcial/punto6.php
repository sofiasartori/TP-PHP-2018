<?php
/*UsuarioModificacion.php: (por POST)se ingresarán todos los valores necesarios (incluida una imagen) para realizar los cambios en los datos de cualquier usuario usuario. */

class UsuarioModificacion{

    public $email;
    public $nombre;
    public $perfil;
    public $edad;
    public $clave;
    public $comentario;
    public $foto;

    function __construct(){
        $this->email=$_POST["email"];
        $this->nombre=$_POST["nombre"];
        $this->perfil=$_POST["perfil"];
        $this->edad=$_POST["edad"];
        $this->clave=$_POST["clave"];
        $this->comentario=$_POST["comentario"];
        $this->foto=$_FILES["foto"]["tmp_name"];
        $this->nombreFoto=$_FILES["foto"]["name"];
        $this->buscarUsuario($this->email, $this->nombre, $this->perfil, $this->edad, $this->clave, $this->comentario, $this->foto, $this->nombreFoto);
    }

    function buscarUsuario($email, $nombre, $perfil, $edad, $clave, $comentario, $foto, $nombreFoto){
        $archivo=fopen('C:/xampp/htdocs/usuarios.txt', "r");
        $encontrado=false;
        while(!feof($archivo)&&($encontrado==false)){
            $linea=fgets($archivo);
            $datos=explode("-", $linea);     
            $datosNuevos=array($email, $nombre, $perfil, $edad, $clave);
            if($datos[0]==$email){
                $encontrado=true;                
                UsuarioModificacion::modificarUsuario($datos, $datosNuevos, $comentario, $foto, $nombreFoto);
            }
        }  
        if($encontrado == false)
            echo "El usuario no existe";    
    }

    function modificarUsuario($datos, $datosNuevos, $comentario, $foto, $nombreFoto){
        $archivo=fopen('C:/xampp/htdocs/usuarios.txt', "a+");
        while(!feof($archivo)){
            $linea=fgets($archivo);
            $datos=explode("-", $linea);
            $lineaNueva=implode("-", $datosNuevos);
            if($datos[0]==$datosNuevos[0]){
                $encontrado=true;
                file_put_contents('C:/xampp/htdocs/usuarios.txt', str_replace($linea, $lineaNueva."\r\n", file_get_contents('C:/xampp/htdocs/usuarios.txt')));
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
        if($encontrado == false)
            echo "El usuario no existe";    
    }

}

$user= new UsuarioModificacion();
?>