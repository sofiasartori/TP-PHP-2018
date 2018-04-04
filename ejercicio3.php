<?php
    /*$valor1=5;
    $valor2=4;
    $valor3=4;*/

    $valor1=5;
    $valor2=4;
    $valor3=6;

    if($valor1>$valor2 && $valor1 <$valor3 || $valor1<$valor2 && $valor1>$valor3)
        echo 'El valor del medio es el valor 1: '. $valor1;
    else if($valor2>$valor1 && $valor2 <$valor3 || $valor2<$valor1 && $valor2>$valor3)
        echo 'El valor del medio es el valor 2: '. $valor2;
    else if($valor3>$valor1 && $valor3 <$valor2 || $valor3<$valor1 && $valor3>$valor2)
        echo 'El valor del medio es el valor 3: '. $valor3;
    else
        echo 'No hay valor del medio';
?>