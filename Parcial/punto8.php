<?php
    /*debe recibir los datos de un usuario de perfil “admin” y el titulo del comentario, 
    de ser todos los datos correctos borrar el comentario y mover la foto a la carpeta backUpFotos y colocarle al nombre la fecha de hoy. */
    class BorrarUsuario{
        public $comentario;
        public $email;

        function __construct(){
            $this->email=$_POST["email"];
            $this->comentario=$_POST["comentario"];
            $this->buscarUsuario($this->email, $this->comentario);
        }

        function buscarUsuario($email, $comentario){
            $archivo=fopen('C:/xampp/htdocs/usuarios.txt', "r");
            $encontrado=false;
            while(!feof($archivo)&&($encontrado==false)){
                $linea=fgets($archivo);
                if(!empty($linea)){
                    $datos=explode("-", rtrim($linea));  
                }
                if(($datos[0]==$email)&&($datos[2]=="admin")){
                    $encontrado=true;
                    BorrarUsuario::buscarComentario($comentario);
                }
            }    
            if($encontrado == false)
                echo "El usuario no existe o el usuario no tiene permisos para borrar";
        }

        function buscarComentario($comentario){
            $archivo=fopen('C:/xampp/htdocs/comentario.txt', "r");
            $encontrado=false;
            while(!feof($archivo)&&($encontrado==false)){
                $linea=fgets($archivo);
                if(!empty($linea)){
                    $comentarios=explode("-", rtrim($linea));  
                }              
                if(rtrim($comentarios[1])==$comentario){
                    $encontrado=true;
                    $texto=$comentarios[0].'-'.$comentarios[1];
                    file_put_contents('C:/xampp/htdocs/comentario.txt', str_replace($texto, "", file_get_contents('C:/xampp/htdocs/comentario.txt')));
                    
                    $fotos=array();
            
                    foreach (glob("C:/xampp/htdocs/ImagenesDeComentario/*.png") as $foto) {
                        $fotos[] = $foto;
                    }
                    $destino='C:/xampp/htdocs/backUpFotos/';                  
                    for ($i=0; $i < sizeof($fotos) ; $i++) { 
                        $nombreFoto = basename($fotos[$i], ".png");
                        if($nombreFoto==$comentario){
                            if(!file_exists($destino)){
                                mkdir($destino);
                                if (copy($fotos[$i],$destino.date("d-m-y").'.png')) {
                                    unlink($fotos[$i]);
                                }
                            }
                            else{
                                if (copy($fotos[$i],$destino.date("d-m-y").'.png')) {
                                    unlink($fotos[$i]);
                                }
                            }
                        }
                    }
                }
            }
            if($encontrado == false)
                echo "El comentario no existe";
        }           
    }

    $user = new BorrarUsuario();
    //VER XQ TIRA INDICE OFFSET
?>