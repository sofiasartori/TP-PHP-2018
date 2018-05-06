<?php
/*Se ingresa email y clave, 
si coincide con algún registro del archivo usuarios.txt retornar “Bienvenido”. De lo contrario informar si el usuario existe o si es error de clave.*/

class VerificarUsuario{

    public $email;
    public $clave;
    
    
    function __construct(){
        $this->email=$_POST["email"];
        $this->clave=$_POST["clave"];
        $this->verificarDatos($this->email, $this->clave);
    }

    function verificarDatos($email,$clave){
        
        $archivo=fopen('C:/xampp/htdocs/usuarios.txt', "r");
        $encontrado=false;
        while(!feof($archivo)&&($encontrado==false)){
            $linea=fgets($archivo);
            if(!empty($linea)){
                $datos=explode("-", $linea);    
            }            
            if(($datos[0]==$email)&&(rtrim($datos[4])==$clave)){
                echo "Bievenido";
                $encontrado=true;
            }
            else if(($datos[0]==$email)&&(rtrim($datos[4])!=$clave)){
                echo "El usuario existe pero la contraseña es incorrecta";
                $encontrado=true;
            }
        }    
        if($encontrado == false)
            echo "El usuario no existe";    
    }
}

$user= new VerificarUsuario();
?>