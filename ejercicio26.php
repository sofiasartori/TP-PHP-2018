<?php

/*Generar una aplicación que sea capaz de copiar un archivo de texto (su ubicación se ingresará por la página) hacia 
otro archivo que será creado y alojado en ./misArchivos/yyyy_mm_dd_hh_ii_ss.txt, dónde yyyy corresponde al año en curso,  
mm al mes, dd al día, hh hora, ii minutos y ss segundos. */

$miArchivo=$_FILES["archivo"]["tmp_name"];
$nombre=date('y').'_'.date('m').'_'.date('d').'_'.date('h').'_'.date('i').'_'.date('s').'.txt';
$destino='misArchivos/';
if(file_exists($destino)){
    move_uploaded_file($miArchivo, $destino.$nombre);  
    echo 'bien';
}
else{
    mkdir("misArchivos/");
    move_uploaded_file($miArchivo, $destino.$nombre);  
    echo 'creo';
}
//move_uploaded_file($miArchivo, './misArchivos/'.date('yyyy').'_'.date('mm').'_'.date('dd').'_'.date('hh').'_'.date('ii').'_'.date('ss'));
?>