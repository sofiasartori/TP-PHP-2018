<?php
/*Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). 
La función validará que la cantidad de caracteres que tiene $palabra no supere a $max y 
además deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas: 
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario. */

$palabra = 'Parcial';
validadora($palabra, 20);

function validadora ($palabra, $max){
    if(sizeof($palabra)<$max){
        if($palabra=='Recuperatorio' || $palabra=='Parcial' || $palabra=='Programacion')
            echo '1';
        else
            echo '0';
    }
}

?>