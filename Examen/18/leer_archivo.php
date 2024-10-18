<?php
$file = "archivo.txt";
$fp = fopen($file, "r");
$contents = fread($fp, filesize($file));
fclose($fp);
echo $contents;