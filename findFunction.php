<?php
include_once 'DatabasePDO.php';
        include_once 'DatabaseProc.php';
        include_once 'DatabaseOOP.php';
        
        
$db = new DatabaseOOP("localhost:3306", "root", "1234", "m07uf3");
$db->connect();
$l = $db->findById($_POST['id2']);

echo "<table><tr>";

for($i = 0; $i<count($l); $i++){
    echo "<td style='background-color: grey; border: 2px solid black; color: white'>" . $l[$i] . "</td>";
}

echo "</tr></table>";
 echo '<p>Volver al Menu Anterior: <a href="mysql_index.php">Volver</a></p>';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

