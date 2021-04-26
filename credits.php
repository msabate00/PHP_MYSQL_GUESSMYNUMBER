<?php

$archivo = 'credits.txt';
$fp = fopen($archivo,'r');
//leemos el archivo
$texto = fread($fp, filesize($archivo));

//transformamos los saltos de linea en etiquetas <br>
$texto = nl2br($texto);
echo $texto;
echo '<p>Volver al Menu Anterior: <a href="index.php">Volver</a></p>';

