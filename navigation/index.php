<?php

$layerClass = $_REQUEST["layer"];
$method = $_REQUEST["action"];
$classRequest = $layerClass . "Controller";
$package = $classRequest . ".php";


include_once("../controller/$package");



// index.php file
// header("Location: ./views/login.php");



if (!isset($layerClass) && !isset($action)) {
    header("Location: ../views/login.php ");
}


$controller = new $classRequest();
$controller->$method();
