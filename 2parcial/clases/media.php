<?php
    class Media{
        public $color;
        public $marca;
        public $precio;
        public $talle;
        public $foto;
        public $id;


        public function traerTodasLasMedias(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, color, marca, precio, talle from medias");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Media");	
        }

        public function InsertarMediaParametros()
	    {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into medias (color, marca, precio, talle, foto)values(:color,:marca,:precio,:talle, :foto)");
            $consulta->bindValue(':color',$this->color, PDO::PARAM_STR);
            $consulta->bindValue(':marca', $this->marca, PDO::PARAM_STR);
            $consulta->bindValue(':precio', $this->precio, PDO::PARAM_STR);
            $consulta->bindValue(':talle', $this->talle, PDO::PARAM_INT);
            $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
            $consulta->execute();		
            return $objetoAccesoDato->RetornarUltimoIdInsertado();
        }
        
        public function BorrarMedia(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("DELETE from medias where id=:id");
            $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
            $consulta->execute();
        }
    }
?>