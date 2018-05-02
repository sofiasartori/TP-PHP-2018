<?php

$miArchivo=$_FILES["archivo"]["tmp_name"];
$destino='misArchivos/';
$nombre=date('y').'_'.date('m').'_'.date('d').'_'.date('h').'_'.date('i').'_'.date('s').'.txt';
$leer=fopen($miArchivo, 'r');

if(!feof($leer)){
    $texto=fgets($leer);
}
$open=fopen($miArchivo, 'w');
fwrite($open, strrev($texto));

if(file_exists($destino)){
    move_uploaded_file($miArchivo, $destino.$nombre);  
    echo 'bien';
}
else{
    mkdir("misArchivos/");
    move_uploaded_file($miArchivo, $destino.$nombre);  
    echo 'creo';
}

?>