<?php
/*Crear una función llamada esPar que reciba un valor entero como parámetro y 
devuelva TRUE si este número es par ó FALSE si es impar.
Reutilizando el código anterior, crear la función esImpar. */

$numero = 18;
$resultado1;
$resultado2;


function esPar ($numero){
    if($numero%2==0){
        return true;
    }
    else
        return false;
}

function esImpar ($numero){
    if($numero%2!=0){
        return true;
    }
    else
        return false;
}
$resultado1=esPar($numero);
$resultado2=esImpar($numero);
echo 'Resultado 1: '.$resultado1.'<br>';
echo 'Resultado 2: '.$resultado2;

?>