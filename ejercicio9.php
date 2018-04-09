<?php
/*Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que contenga 
como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres lapiceras.*/

$lapicera1 = array('color' => 'azul', 'marca' => 'bic', 'trazo'=>'medio', 'precio'=>'$10');
$lapicera2 = array('color' => 'rojo', 'marca' => 'faber castell', 'trazo'=>'medio', 'precio'=>'$20');
$lapicera3 = array('color' => 'negro', 'marca' => 'parker', 'trazo'=>'fino', 'precio'=>'$100');

foreach ($lapicera1 as $clave=>$valor) {
    echo $clave.' '.$valor.'<br>';    
}
foreach ($lapicera2 as $clave=>$valor) {
    echo $clave.' '.$valor.'<br>';    
}
foreach ($lapicera3 as $clave=>$valor) {
    echo $clave.' '.$valor.'<br>';    
}

?>