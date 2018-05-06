<?php
/*php(por POST), debe recibir una opcion para saber si muestra las fotos cargadas o las borradas */

class ListadoDeImagenes{
    public $opcion;

    function __construct(){
        $this->opcion=$_POST["fotos"];
        $this->mostrarImagenes($this->opcion);
    }

    function mostrarImagenes($opcion){
        $fotos=array();
        
        if($opcion=="cargadas"){
            foreach (glob("C:/xampp/htdocs/ImagenesDeComentario/*.png") as $foto) {
                $fotos[] = $foto;
            }                 
        }
        else{
            foreach (glob("C:/xampp/htdocs/backUpFotos/*.png") as $foto) {
                $fotos[] = $foto;
            }
        }        
        
        for ($i=0; $i < sizeof($fotos) ; $i++) { 
            echo "<img src='".$fotos[$i]."' width=100; height=100;></img>";
        }
    }

}

$opcion=new ListadoDeImagenes();
?>