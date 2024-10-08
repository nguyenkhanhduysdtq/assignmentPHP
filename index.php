<?php

// index.php file
include_once("controller/loginController.php");

$controller = new loginController();

$controller->login();
