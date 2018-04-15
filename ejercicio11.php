<?php

calcularPotencias();
$resultado=0;
function calcularPotencias(){
    for ($i=1; $i <5 ; $i++) { 
        for ($j=1; $j <5 ; $j++) { 
            $resultado=pow($i, $j);
            echo $i.' a la '.$j.' es= '.$resultado.'<br>';
        }        
    }
}
?>