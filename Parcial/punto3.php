<?php

/*AltaComentario.php: (por POST)se recibe el 
email del usuario y el titulo del comentario y en comentario, si el mail existe en el archivo usuario.txt guarda en el archivo Comentario.txt.*/
class AltaComentario{

    public $email;
    public $comentario;
    
    
    function __construct(){
        $this->email=$_POST["email"];
        $this->comentario=$_POST["comentario"];
        $this->verificarDatos($this->email, $this->comentario);
    }

    function verificarDatos($email,$comentario){
        
        $archivo=fopen('C:/xampp/htdocs/usuarios.txt', "r");
        $encontrado=false;
        while(!feof($archivo)&&($encontrado==false)){
            $linea=fgets($archivo);
            $datos=explode("-", $linea);
            if($datos[0]==$email){
                $encontrado=true;
                AltaComentario::escribirComentario($email, $comentario);
            }
        }    
        if($encontrado == false)
            echo "El usuario no existe";    
    }

    function escribirComentario($email, $comentario){
        $archivo=fopen('C:/xampp/htdocs/comentario.txt', "a+");
        fwrite($archivo, $email.'-'.$comentario);
    }
}

$user= new AltaComentario();
?>