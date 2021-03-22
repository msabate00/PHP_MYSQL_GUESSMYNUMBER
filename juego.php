<?php
//session_start();

include_once('objectos.php');
require_once("objectos.php");
$maquina = unserialize($_SESSION['maquina']);
//$_SESSION['maquina'];
//echo var_dump($maquina->mode);
if($maquina->getPrimer() && $maquina->mode == "jugador"){
   // $maquina->setPrimer();
    $maquina->mostrarFormInicial();
}else{
    if($maquina->mode == "jugador"){
        $maquina->paso($_GET['num']);    
    }else{
        $maquina->puntoMedio();
    }
    
}
$_SESSION['maquina'] = serialize($maquina);

?>



