<?php
session_start();
define('ROOT',dirname(__FILE__));
require_once ROOT . '/components/Autoload.php';
//подключаются с помощью Autoload.php
// require_once ROOT . '/components/Router.php';
// require_once ROOT . '/components/Db.php';

$router = new Router();
$router->run();