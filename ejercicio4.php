<?php

/*Escribir un programa que use la variable $operador que pueda 
almacenar los símbolos matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos 
variables enteras $op1 y $op2. De acuerdo al símbolo que tenga la variable 
$operador, deberá realizarse la operación indicada y mostrarse el resultado 
por pantalla.*/
    $operador = '+';
    $op1 = 3;
    $op2 = 4;

    
    if($operador=='+')
        echo 'suma: '.$op1+$op2.'<br>';
    elseif ($operador=='-')
        echo 'resta: '.$op1-$op2.'<br>';
    elseif($operador=='/')
        echo 'division: '.$op1/$op2.'<br>';
    else
        echo 'multiplicacion: '.$op1*$op2.'<br>';
        
?>