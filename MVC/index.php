<?php
// Enrutamiento
$c = isset($_GET['c']) ? $_GET['c'] : 'Home';
$a = isset($_GET['a']) ? $_GET['a'] : 'index';

require_once __DIR__ . "/controller/{$c}Controller.php";


$controllerClass = $c . 'Controller';
$controller = new $controllerClass();
$controller->$a();
