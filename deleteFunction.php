<?php
include_once 'DatabasePDO.php';
        include_once 'DatabaseProc.php';
        include_once 'DatabaseOOP.php';
        
$db = new DatabaseOOP("localhost:3306", "root", "1234", "m07uf3");
$db->connect();
$db->delete($_POST["id"]);

sleep(1.5);
header("Location: ./mysql_index.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

