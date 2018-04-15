<?php
$arrayPalabra = array('P', 'a', 'l', 'a', 'b', 'r', 'a');
invertirOrden($arrayPalabra);

function invertirOrden($arrayParam){    
    for ($i=sizeof($arrayParam); $i>0 ; $i--) { 
        echo $arrayParam[$i-1];
    }
}
?>