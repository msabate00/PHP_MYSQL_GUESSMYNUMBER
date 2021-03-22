<?php
require_once("objectos.php");
session_start();
/*$_SESSION["moda"]= $_POST["modalidad"];
$_SESSION["nive"]= $_POST["nivel"];*/
//$maquina = new Maquina($_POST["nivel"], $_POST["modalidad"]);
//$_SESSION['maquina'] = serialize($maquina);

$_SESSION['maquina'] = serialize(new Maquina($_POST["nivel"], $_POST["modalidad"]));


header('Location: ./juego.php');

?>


