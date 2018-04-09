<?php
    echo 'Fecha y hora actual: '.date('d-m-Y H:i:s').'<br>';
    $mes = date('m');
    $dia = date('d');

    if(($dia>21 && $mes = 3) || ($dia<21 && $mes <=6 ))
        echo 'La estación es otoño';
    elseif(($dia>21 &&$mes =6) || ($dia<21 &&$mes<=9 ))
        echo 'La estación es invierno';
    elseif(($dia>21 &&$mes =9) || ($dia<21 &&$mes <=12))
        echo 'La estación es primavera';
    else
        echo 'La estación es verano';
?>