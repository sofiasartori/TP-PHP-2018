<?php

$miArchivo=$_FILES["archivo"]["tmp_name"];
$destino='misArchivos/';
$nombre=date('y').'_'.date('m').'_'.date('d').'_'.date('h').'_'.date('i').'_'.date('s').'.txt';
$leer=fopen($miArchivo, 'r');

if(!feof($leer)){
    $texto=fgets($leer);
}

$cantPalabras=str_word_count($texto);

for ($i=0; $i < $cantPalabras; $i++) { 
    $palabras=explode(" ", $texto);    
}
$tabla="<table><th>Palabra</th><th>Cantidad de caracteres</th>";
for ($j=0; $j <$cantPalabras ; $j++) { 
    $tabla=$tabla."<tr><td>".$palabras[$j]."</td><td>".strlen($palabras[$j])."</td></tr>";
}
$tabla=$tabla."</table>";
echo $tabla;

?>