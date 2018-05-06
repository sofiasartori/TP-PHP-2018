<?php
/*TablaComentarios.php, puede recibir datos del 
comentario como el usuario, el titulo o nada para hacer una busqueda, y retornará una tabla con: (la imagen del comentario, el titulo , la edad del usuario y el nombre ) */

class TablaComentarios{
    public $usuario;
    public $titulo;

    function __construct(){

        if(isset($_POST["email"])){
            $this->usuario = $_POST["email"];
        }        
        if(isset($_POST["titulo"])){
            $this->titulo = $_POST["titulo"];
        }
            $this->dibujarTabla($this->usuario,$this->titulo);
        
    }

    function obtenerComentarios($usuario,$titulo){
        $comentarios=fopen('C:/xampp/htdocs/comentario.txt', "r");
        $comentariosArray=array();
        while(!feof($comentarios)){
            $lineac=fgets($comentarios);
            if(!empty($lineac)){
                $datosc=explode("-", $lineac);
            }
            if(!isset($titulo) && !isset($usuario)){
                array_push($comentariosArray, $datosc);            
            }else if(isset($titulo)){
                if($titulo==rtrim($datosc[1])){
                    array_push($comentariosArray, $datosc);
                }
            }else if(isset($usuario)){
                if($usuario==$datosc[0]){
                    array_push($comentariosArray, $datosc);
                }
            }else if($titulo==rtrim($datosc[1]) && $usuario==$datosc[0]){
                    array_push($comentariosArray, $datosc);
                }
            
        }
        return $comentariosArray;
    }
    
    function obtenerDatosUsuario($usuario){
        $usuarios=fopen('C:/xampp/htdocs/usuarios.txt', "r");
        $usuariosArray = array();
        $usuarioGuardado;
        while(!feof($usuarios)){
            $linea=fgets($usuarios);
            if(!empty($linea)){
                $datos=explode("-", $linea);   
            }
            if($datos[0]==$usuario) 
                return $datos;
        }
        return null;
    } 

    function dibujarTabla($usuario,$titulo){

        $comentariosArray=TablaComentarios::obtenerComentarios($usuario,$titulo);

        $fotos=array();
        $tabla='<table border=1><th>Usuario</th>
        <th>Edad</th>
        <th>Comentario</th>
        <th>Foto</th>';
            
        foreach (glob("C:/xampp/htdocs/ImagenesDeComentario/*.png") as $foto) {
            $fotos[] = $foto;
        }
        
        for ($i=0; $i < sizeof($comentariosArray) ; $i++) {
            
            $nombreFoto = TablaComentarios::obtenerFoto($fotos,$comentariosArray[$i][1]);
            $usuarioGuardato = TablaComentarios::obtenerDatosUsuario($comentariosArray[$i][0]);
            $tabla=$tabla.'<tr><td>'.$usuarioGuardato[0].'</td>
                <td>'.$usuarioGuardato[3].'</td>';
            if(($usuarioGuardato[0])==($comentariosArray[$i][0])){
                $tabla=$tabla.'<td>'.$comentariosArray[$i][1].'</td>';
            }
            else 
                $tabla=$tabla.'<td></td>';
            $tabla=$tabla.'<td><img src="'.$nombreFoto.'" height=50; width=50;></img></td>';           
        }
        $tabla=$tabla.'</table>';
        echo $tabla;
    }      
    
    
    function obtenerFoto($fotos,$comentario){
        $nombreFoto = 'C:/xampp/htdocs/ImagenesDeComentario/'.rtrim($comentario).'.png';
            if(!TablaComentarios::existeFoto($fotos, $nombreFoto))
            {
                $nombreFoto="";
            }
        return $nombreFoto;
    }


    function existeFoto($fotos, $nombreFoto){
        $encontrada=false;
        for ($i=0; ($i <sizeof($fotos))&& !$encontrada; $i++) { 
            if($fotos[$i]==rtrim($nombreFoto))
                $encontrada=true;
        }
        return $encontrada;
    }
}

$tabla = new TablaComentarios();
?>


