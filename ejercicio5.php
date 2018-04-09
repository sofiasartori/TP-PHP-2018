<?php
/*Realizar un programa que en base al valor numérico de una variable $num, 
pueda mostrarse por pantalla, el nombre del número que tenga dentro escrito 
con palabras, para los números entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.*/

$num=48;

if($num==20)
    echo 'Veinte';
elseif ($num >20 && $num<30) 
    echo 'Veinti'.numeros(substr($num, -1));
elseif ($num ==30) 
    echo 'Treinta';
elseif ($num >30 && $num<40) 
    echo 'Treinta y '.numeros(substr($num, -1));
elseif ($num ==40) 
    echo 'Cuarenta';
elseif ($num >40 && $num<50) 
    echo 'Cuarenta y '.numeros(substr($num, -1));
elseif ($num ==50) 
    echo 'Cincuenta';
elseif ($num >50 && $num<60)
    echo 'Cincuenta y '.numeros(substr($num, -1));
else
    echo 'Sesenta';

function numeros($numero){
    if($numero==1)
        return 'uno';
    elseif ($numero==2) 
        return 'dos';
    elseif ($numero==3) 
        return 'tres';
    elseif ($numero==4) 
        return 'cuatro';
    elseif ($numero==5) 
        return 'cinco';
    elseif ($numero==6) 
        return 'seis';
    elseif ($numero==7) 
        return 'siete';
    elseif ($numero==8) 
        return 'ocho';
    else 
        return 'nueve';
}

?>