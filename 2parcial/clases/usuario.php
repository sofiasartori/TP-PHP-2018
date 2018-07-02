<?php
    class Usuario{
        public $nombre;
        public $clave;
        public $perfil;

        public function traerTodosLosUsuarios(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id_usuario, nombre, clave from usuarios");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");	
        }

        public function InsertarUsuarioParametros()
	    {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (nombre, clave)values(:nombre, :clave)");
            $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
            $consulta->bindValue(':clave',$this->clave, PDO::PARAM_STR);
            $consulta->execute();		
            return $objetoAccesoDato->RetornarUltimoIdInsertado();
        }
        
        public function TraerUnUsuario($usuario, $clave) 
	    {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select nombre, perfil from usuarios where nombre= '$usuario' and clave='$clave'");
            $consulta->execute();
            $usuarioBuscado= $consulta->fetchObject('Usuario');
            return $usuarioBuscado;				
	    }
    }
?>