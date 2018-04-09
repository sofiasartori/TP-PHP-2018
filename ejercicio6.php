<?php

/*Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la función rand). 
Mediante una estructura condicional, determinar si el promedio de los números son mayores, menores o iguales que 6. Mostrar 
un mensaje por pantalla informando el resultado.*/

$miArray=array();

for ($i=0; $i <5 ; $i++) { 
    $miArray[$i]=rand();
}
var_dump($miArray);
echo 'Promedio: '.array_sum($miArray)/count($miArray);

if(array_sum($miArray)/count($miArray)==6)
    echo 'El promedio es 6';
elseif (array_sum($miArray)/count($miArray)>6) {
    echo 'El promedio es mayor a 6';
}
else
    echo 'El promedio es menor a 6';

?>