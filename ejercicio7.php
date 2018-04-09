<?php
/*Generar una aplicación que permita cargar los primeros 10 números impares en un Array. Luego imprimir 
(utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando las estructuras while y foreach. */

$miArray=array();

for ($i=0; $i <20 ; $i++) { 
    $miArray[$i]=rand();
}

/*for ($j=0; $j <20 ; $j++) { 
    if($miArray[$j]%2!=0){
        echo $miArray[$j].'<br>';
    }
}

$contador=0;
while($contador<20){
    if($miArray[$contador]%2!=0){
        echo $miArray[$contador].'<br>';
    }
    $contador++;
}*/

foreach ($miArray as $key) {
    if($key%2!=0){
        echo $key.'<br>';
    }
}
var_dump($miArray);

?>