<?php
$numero = $_POST['numero'];
if (!is_numeric($numero)) echo 'No es un numero';
$texto = $_POST['text'];
if (!is_string($texto)) echo 'No es un texto';
