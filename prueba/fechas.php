<?php

$fecha = date('l d \of F Y h:i:s A');
echo $fecha;

$array = explode(' ', $fecha);
foreach($array as $fecha){
    echo "$fecha \n";
};
