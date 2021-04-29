<?php
include_once 'DatabasePDO.php';
include_once 'DatabaseProc.php';
include_once 'DatabaseOOP.php';
include_once 'estadistica.php';

$db = new DatabaseOOP("localhost:3306", "root", "1234", "m07uf3");
$db->connect();
$db->update(new estadistica($_POST['id3'], $_POST['moda'], $_POST['nivell'], $_POST['date'], $_POST['intents']));

sleep(1.5);
header("Location: ./mysql_index.php");

?>
