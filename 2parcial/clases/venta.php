<?php
    class Venta{
        public $idVenta;
        public $idMedia;
        public $nombreCliente;
        public $fecha;
        public $importe;
        public $foto;

        public function traerTodasLasVentas(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, color, marca, precio, talle from ventas");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Venta");	
        }

        public function InsertarVenta()
	    {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into ventas (id_media, nombre_cliente, fecha, importe, foto)values(:id, :nombre, CURRENT_TIMESTAMP, :importe, :foto)");
            $consulta->bindValue(':id',$this->idMedia, PDO::PARAM_INT);
            $consulta->bindValue(':nombre', $this->nombreCliente, PDO::PARAM_STR);
            $consulta->bindValue(':importe', $this->importe, PDO::PARAM_STR);
            $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
            $consulta->execute();		
        }
        
        public function ModificarVenta(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE ventas set id_media=:id, nombre_cliente, fecha=CURRENT_TIMESTAMP, importe=:importe, foto=:foto WHERE id_venta=:id_venta");
            $consulta->bindValue(':id_venta',$this->idVenta, PDO::PARAM_INT);
            $consulta->bindValue(':id',$this->idMedia, PDO::PARAM_INT);
            $consulta->bindValue(':nombre', $this->nombreCliente, PDO::PARAM_STR);
            $consulta->bindValue(':importe', $this->importe, PDO::PARAM_STR);
            $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
            $consulta->execute();		
        }
    }
?>