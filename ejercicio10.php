<?php

$lapicera1 = array('color' => 'azul', 'marca' => 'bic', 'trazo'=>'medio', 'precio'=>'$10');
$lapicera2 = array('color' => 'rojo', 'marca' => 'faber castell', 'trazo'=>'medio', 'precio'=>'$20');
$lapicera3 = array('color' => 'negro', 'marca' => 'parker', 'trazo'=>'fino', 'precio'=>'$100');
//indexado
$arrayLapiceras=array($lapicera1, $lapicera2, $lapicera3);
//asociativo
$arrayLapiceras=array('1'=>$lapicera1, '2'=>$lapicera2, '3'=>$lapicera3);

foreach ($arrayLapiceras as $lapicera) {
    foreach ($lapicera as $clave => $valor) {
        echo $clave.' '.$valor.'<br>';
    }    
}

?>