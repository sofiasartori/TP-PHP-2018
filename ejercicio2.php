<?php
    echo 'Fecha y hora actual: '.date('d-m-Y H:i:s').'<br>';
    $mes = date('m');

    if($mes >= 3 && $mes <=6 )
        echo 'La estación es otoño';
    else if($mes >6 && $mes<=9 )
        echo 'La estación es invierno';
    else if($mes >9 && $mes <=12)
        echo 'La estación es primavera';
    else
        echo 'La estación es verano';
?>